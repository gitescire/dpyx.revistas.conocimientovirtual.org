<?php

namespace App\Http\Livewire\Evaluations\Categories\Questions;

use App\Models\Announcement;
use App\Models\Answer;
use App\Models\Category;
use App\Models\Choice;
use App\Models\Evaluation;
use App\Models\Question;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class Index extends Component
{
    public $evaluation;
    public $repository;
    public $categoryChoosed;
    public $categories;
    public $subcategories;
    public $answers;
    public $announcement;
    public $nextCategory;
    public $showComplementaryQuestions = false;

    public function mount(Evaluation $evaluation, Category $category)
    {
        $this->nextCategory = Category::where('id', '>', $category->id)->first() ?? $category;
        $this->evaluation = $evaluation->append('is_answerable');
        $this->repository = $this->evaluation->repositories()->first();
        $this->categoryChoosed = $category;
        $this->categories = Category::has('questions')->get();
    }

    public function storeAnswer($question, $choice = null)
    {
        $choice = Choice::find($choice);
        $question = Question::find($question);

        // Delete answer if not choice
        // if ($choice == null) {
        // Answer::where('question_id', $question->id)->where('evaluation_id', $this->evaluation->id)->delete();
        // } else {
        $answer = Answer::updateOrCreate([
            'evaluation_id' => $this->evaluation->id,
            'question_id' => $question->id,
        ], [
            'choice_id' => $choice ? $choice->id : null,
            'question_id' => $question->id,
            'evaluation_id' => $this->evaluation->id,
        ]);
        // }


        $requiredQuestionsIds = Question::required()->get()->pluck('id')->flatten();
        $requiredQuestionsAnswered = $this->evaluation->answers()->whereIn('question_id', $requiredQuestionsIds)->has('choice')->get();

        if ($requiredQuestionsIds->count() == $requiredQuestionsAnswered->count()) {
            $this->evaluation->status = 'contestada';
            $this->evaluation->save();
        } else {
            $this->evaluation->status = 'en progreso';
            $this->evaluation->save();
        }
    }

    public function updateDescription(Answer $answer, $description)
    {
        $answer->description = $description;
        $answer->save();
    }

    public function render()
    {
        $this->announcement = Announcement::active()->first();
        $this->checkIfCategoriesAreAnswered();
        $this->subcategories = Subcategory::with(['questions' => function ($query) {
            $query->where('category_id', $this->categoryChoosed->id)->with(['choices' => function ($query) {
                $query->orderBy('punctuation', 'desc');
            }]);
        }])
            ->get()
            ->append('has_questions');

        $this->subcategories->map(function ($subcategory) {
            return $subcategory->questions->map(function ($question) {

                $answer = Answer::where('evaluation_id', $this->evaluation->id)->where('question_id', $question->id)->with('choice', 'observation')->first();
                $question->answer = $answer;

                if ($question->answer) {
                    $question->answer->route = route('answers.show', [$question->answer]);
                }

                $question->status = $question->answer ? 'contestada' : 'pendiente';

                return $question
                    ->append('max_punctuation');
            });
        });

        $this->subcategories->each(function ($subcategory) {
            $subcategory->total_required_punctuation = $subcategory->questions->where('is_optional', 0)->pluck('answer.choice.punctuation')->flatten()->sum();
            $subcategory->total_supplementary_punctuation = $subcategory->questions->where('is_optional', 1)->pluck('answer.choice.punctuation')->flatten()->sum();
            $subcategory->max_required_punctuation = $subcategory->questions->where('is_optional', 0)->pluck('max_punctuation')->flatten()->sum();
            $subcategory->max_supplementary_punctuation = $subcategory->questions->where('is_optional', 1)->pluck('max_punctuation')->flatten()->sum();
        });

        return view('livewire.evaluations.categories.questions.index');
    }

    protected function checkIfCategoriesAreAnswered()
    {
        $this->categories->each(function ($category) {
            $questions = $category->questions()->required()->get();
            $answers = $this->evaluation->answers()->has('choice')->whereIn('question_id', $questions->pluck('id'))->get();

            $category->is_answered = $answers->count() == $questions->count();
        });
    }

    public function toggleSupplementaryQuestions()
    {
        $this->showComplementaryQuestions = !$this->showComplementaryQuestions;
    }
}
