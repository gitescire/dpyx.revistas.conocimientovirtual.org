<?php

namespace App\Mail;

use App\Models\Repository;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Category;
use App\Models\Subcategory;
use PDF;

class ReviewedRepositoryMail extends Mailable
{
    use Queueable, SerializesModels;

    public $repository;
    public $comments;
    public $certificationPDF;
    public $evaluationPDF;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Repository $repository, $comments = "")
    {
        $this->repository = $repository;
        $this->comments = $comments;

        $evaluation = $repository->evaluations()->latest()->first();

        $categories = Category::has('questions')->get();

        $subcategories = Subcategory::has('questions')->with(['questions.answers' => function ($query) use ($evaluation) {
            $query->where('evaluation_id', $evaluation->id);
        }])->get();

        $this->evaluationPDF = PDF::loadView('pdfs.evaluation', compact('repository', 'categories', 'subcategories'));
        
        $this->evaluationPDF->setPaper('Letter');

        if ( config('dpyx.has_certification') ) {
            $this->certificationPDF = PDF::loadView('pdfs.certification', compact('repository'));
            $this->certificationPDF->setPaper('Letter', 'landscape');
        }
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $message = $this->markdown('mails.repositories.reviewed')
        ->subject('Revista revisada')
            ->attachData($this->evaluationPDF->output(), 'evaluacion.pdf', [
                'mime' => 'application/pdf',
            ]);

        if ($this->repository->is_aproved && config('dpyx.has_certification')) {
            $message->attachData($this->certificationPDF->output(), 'certificacion.pdf', [
                'mime' => 'application/pdf',
            ]);
        }

        return $message;
    }
}
