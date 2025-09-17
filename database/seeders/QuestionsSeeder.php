<?php

namespace Database\Seeders;

use App\Models\Choice;
use App\Models\Question;
use Illuminate\Database\Seeder;

class QuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $question = Question::create([
            'description' => '¿Tiene una definición del tipo de contenido con el que se puede contar?',
            'order' => 1,
            'category_id' => 1,
            'subcategory_id' => 1,
            'help_text' => '.',
            'is_optional' => 1,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 1,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -1,
        ]);

        

        $question = Question::create([
            'description' => 'Las definiciones se encuentran publicadas',
            'order' => 2,
            'category_id' => 1,
            'subcategory_id' => 1,
            'help_text' => '.',
            'is_optional' => 1,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 1,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -1,
        ]);

        $question = Question::create([
            'description' => 'Se cuenta con política publicada de Integridad Académica',
            'order' => 3,
            'category_id' => 1,
            'subcategory_id' => 1,
            'help_text' => '.',
            'is_optional' => 1,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 2,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -2,
        ]);

        $question = Question::create([
            'description' => 'Se realizan revisiones antiplagio',
            'order' => 4,
            'category_id' => 1,
            'subcategory_id' => 1,
            'help_text' => '.',
            'is_optional' => 1,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 1,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -1,
        ]);

        $question = Question::create([
            'description' => 'Se cuenta con política publicada de autodepósito',
            'order' => 5,
            'category_id' => 1,
            'subcategory_id' => 1,
            'help_text' => '.',
            'is_optional' => 1,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 1,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -1,
        ]);

        $question = Question::create([
            'description' => 'El usuario autoriza la publicación en abierto',
            'order' => 1,
            'category_id' => 1,
            'subcategory_id' => 1,
            'help_text' => '.',
            'is_optional' => 1,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 2,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -2,
        ]);

        $question = Question::create([
            'description' => 'El usuario autoriza la transformación',
            'order' => 1,
            'category_id' => 1,
            'subcategory_id' => 1,
            'help_text' => '.',
            'is_optional' => 1,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 1,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -1,
        ]);

        $question = Question::create([
            'description' => 'El usuario selecciona libremente la licencia de su contenido',
            'order' => 1,
            'category_id' => 1,
            'subcategory_id' => 1,
            'help_text' => '.',
            'is_optional' => 1,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 1,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -1,
        ]);

        $question = Question::create([
            'description' => 'Porcentaje de documentos resultado de autodepósito en el año actual y anterior (rangos de 5 cada 20%)',
            'order' => 1,
            'category_id' => 1,
            'subcategory_id' => 2,
            'help_text' => '.',
            'is_optional' => 1,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 4,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -4,
        ]);

        $question = Question::create([
            'description' => 'El usuario autoriza la transformación',
            'order' => 2,
            'category_id' => 1,
            'subcategory_id' => 2,
            'help_text' => '.',
            'is_optional' => 1,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 6,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -6,
        ]);

        $question = Question::create([
            'description' => '¿Se cuenta con personal encargado, con roles, funciones, responsabilidades?',
            'order' => 1,
            'category_id' => 3,
            'subcategory_id' => 1,
            'help_text' => '.',
            'is_optional' => 1,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 2,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -2,
        ]);

        $question = Question::create([
            'description' => '¿Se cuenta con un presupuesto anual para la operación del RI?',
            'order' => 2,
            'category_id' => 3,
            'subcategory_id' => 1,
            'help_text' => '.',
            'is_optional' => 1,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 2,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -2,
        ]);

        $question = Question::create([
            'description' => '¿Existe un documento de acceso público, fácilmente accesible desde la página principal del repositorio en el que se establecen cuáles son los objetivos, alcance y funciones del mismo?',
            'order' => 501,
            'category_id' => 3,
            'subcategory_id' => 1,
            'help_text' => 'En caso afirmativo, añadir url.',
            'is_optional' => 0,
            'has_description_field' => 1,
            'description_label' => 'Añadir URL del documento'
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 45,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -45,
        ]);

        $question = Question::create([
            'description' => '¿Se cuenta con un programa de formación continua para el personal encargadado del RI?',
            'order' => 4,
            'category_id' => 3,
            'subcategory_id' => 1,
            'help_text' => '.',
            'is_optional' => 1,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 2,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -2,
        ]);

        $question = Question::create([
            'description' => '¿Se cuenta con un compromiso de transparencia y rendición de cuentas por parte de todas las personas y áreas involucradas en el RI?',
            'order' => 5,
            'category_id' => 3,
            'subcategory_id' => 1,
            'help_text' => '.',
            'is_optional' => 1,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 2,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -2,
        ]);

        $question = Question::create([
            'description' => '¿Existen políticas de transparencia con respecto a los recursos que consume el RI?',
            'order' => 1,
            'category_id' => 3,
            'subcategory_id' => 1,
            'help_text' => '.',
            'is_optional' => 1,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 2,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -2,
        ]);

        $question = Question::create([
            'description' => '¿Existe personal responsable de la preservación?',
            'order' => 1,
            'category_id' => 3,
            'subcategory_id' => 2,
            'help_text' => '.',
            'is_optional' => 1,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 2,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -2,
        ]);

        $question = Question::create([
            'description' => '¿El personal cuenta con dominio de estándares?',
            'order' => 2,
            'category_id' => 3,
            'subcategory_id' => 2,
            'help_text' => '.',
            'is_optional' => 1,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 2,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -2,
        ]);

        $question = Question::create([
            'description' => '¿Existe personal técnico dedicado y responsable de la operación de la plataforma tecnológica?',
            'order' => 3,
            'category_id' => 3,
            'subcategory_id' => 2,
            'help_text' => '.',
            'is_optional' => 1,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 3,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -3,
        ]);

        $question = Question::create([
            'description' => '¿El personal técnico cuenta con la experiencia y el tiempo para desarrollar funciones específicas?',
            'order' => 4,
            'category_id' => 3,
            'subcategory_id' => 2,
            'help_text' => '.',
            'is_optional' => 1,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 3,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -3,
        ]);

        $question = Question::create([
            'description' => '¿El RI acepta abiertamente y de forma pública su responsabilidad de preservar los contenidos?',
            'order' => 1,
            'category_id' => 4,
            'subcategory_id' => 1,
            'help_text' => '.',
            'is_optional' => 1,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 10,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -10,
        ]);

        $question = Question::create([
            'description' => '¿Se cuenta con una política pública y de fácil acceso, donde se notifique a los usuarios de que los  contenidos serán transformados?',
            'order' => 1,
            'category_id' => 4,
            'subcategory_id' => 2,
            'help_text' => NULL,
            'is_optional' => 1,
            'has_description_field' => 0,
            'description_label' => NULL
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 25,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -25,
        ]);

        $question = Question::create([
            'description' => '¿Se informa al usuario los estándares que se utilizan para preservación digital, mediante un documento público y fácilmente accesible desde la página principal del repositorio ?',
            'order' => 2,
            'category_id' => 4,
            'subcategory_id' => 2,
            'help_text' => NULL,
            'is_optional' => 1,
            'has_description_field' => 0,
            'description_label' => NULL
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 15,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -15,
        ]);

        $question = Question::create([
            'description' => '¿Se tienen definidos los niveles que se cubrirán con respecto a la preservación digital, plasmados en un documento público y fácilmente accesible desde la página principal del repositorio ?',
            'order' => 3,
            'category_id' => 4,
            'subcategory_id' => 2,
            'help_text' => NULL,
            'is_optional' => 1,
            'has_description_field' => 0,
            'description_label' => NULL
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 30,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -30,
        ]);

        $question = Question::create([
            'description' => '¿Se tiene definido el proceso para gestionar el inventario de recursos digitales, así como el proceso de revisiones de integridad del contenido?',
            'order' => 4,
            'category_id' => 4,
            'subcategory_id' => 2,
            'help_text' => NULL,
            'is_optional' => 1,
            'has_description_field' => 0,
            'description_label' => NULL
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 30,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -30,
        ]);

        $question = Question::create([
            'description' => '¿Se cuenta con capacidad de gestionar y visibilizar formatos abiertos?',
            'order' => 1,
            'category_id' => 5,
            'subcategory_id' => 1,
            'help_text' => '.',
            'is_optional' => 1,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 3,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -3,
        ]);

        $question = Question::create([
            'description' => '¿Se tiene definido el tipo de formatos abiertos a utilizar?',
            'order' => 2,
            'category_id' => 5,
            'subcategory_id' => 1,
            'help_text' => '.',
            'is_optional' => 1,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 3,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -3,
        ]);

        $question = Question::create([
            'description' => '¿Se cuenta con una especificación sobre los formatos técnicos aceptables en el repositorio?',
            'order' => 3,
            'category_id' => 5,
            'subcategory_id' => 1,
            'help_text' => '.',
            'is_optional' => 1,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 2,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -2,
        ]);

        $question = Question::create([
            'description' => '¿Se cuenta con una especificación para los materiales distintos a los documentos, por ejemplo, los sets de datos?',
            'order' => 4,
            'category_id' => 5,
            'subcategory_id' => 1,
            'help_text' => '.',
            'is_optional' => 1,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 2,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -2,
        ]);

        $question = Question::create([
            'description' => '¿Se cuenta con un plan de conversión o transformación desde formatos cerrados a formatos abiertos?',
            'order' => 1,
            'category_id' => 5,
            'subcategory_id' => 2,
            'help_text' => NULL,
            'is_optional' => 1,
            'has_description_field' => 0,
            'description_label' => NULL
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 40,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -40,
        ]);

        $question = Question::create([
            'description' => '¿Se cuenta con la documentación técnica que garantice el uso de formatos abiertos en el largo plazo?',
            'order' => 2,
            'category_id' => 5,
            'subcategory_id' => 2,
            'help_text' => NULL,
            'is_optional' => 1,
            'has_description_field' => 0,
            'description_label' => NULL
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 30,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -30,
        ]);

        $question = Question::create([
            'description' => '¿Se cuenta con una metodología para gestión los formatos técnicos distintos a los documentos?',
            'order' => 3,
            'category_id' => 5,
            'subcategory_id' => 2,
            'help_text' => NULL,
            'is_optional' => 1,
            'has_description_field' => 0,
            'description_label' => NULL
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 30,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -30,
        ]);

        $question = Question::create([
            'description' => '¿Se cuenta con un programa permanente de actualización?',
            'order' => 1,
            'category_id' => 6,
            'subcategory_id' => 1,
            'help_text' => '.',
            'is_optional' => 1,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 2,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -2,
        ]);

        $question = Question::create([
            'description' => '¿Se cuenta con un plan de crecimiento de S.W.?',
            'order' => 2,
            'category_id' => 6,
            'subcategory_id' => 1,
            'help_text' => '.',
            'is_optional' => 1,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 1,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -1,
        ]);

        $question = Question::create([
            'description' => '¿Se cuenta con la documentación técnica necesaria para que el sistema sea administrado a futuro sin importar cambios en el personal?',
            'order' => 3,
            'category_id' => 6,
            'subcategory_id' => 1,
            'help_text' => '.',
            'is_optional' => 1,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 1,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -1,
        ]);

        $question = Question::create([
            'description' => '¿Se cuenta con un plan de trabajo para realizar desarrollos a la medida?',
            'order' => 4,
            'category_id' => 6,
            'subcategory_id' => 1,
            'help_text' => '.',
            'is_optional' => 1,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 2,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -2,
        ]);

        $question = Question::create([
            'description' => '¿Se cuenta con un control de versiones, actualizaciones?',
            'order' => 5,
            'category_id' => 6,
            'subcategory_id' => 1,
            'help_text' => '.',
            'is_optional' => 1,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 1,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -1,
        ]);

        $question = Question::create([
            'description' => '¿El personal responsable del RI interactua y participa activamente en foros y grupos internacionales de desarrollo de la plataforma seleccionada?',
            'order' => 50,
            'category_id' => 6,
            'subcategory_id' => 1,
            'help_text' => '.',
            'is_optional' => 1,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 3,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -3,
        ]);

        $question = Question::create([
            'description' => '¿Se cuenta con acceso completo a la información, con metadatos, sin nigún tipo de restricción?',
            'order' => 1,
            'category_id' => 6,
            'subcategory_id' => 2,
            'help_text' => '.',
            'is_optional' => 1,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 6,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -6,
        ]);

        $question = Question::create([
            'description' => '¿Se realizan pruebas de seguridad informática y estrés a la plataforma?',
            'order' => 2,
            'category_id' => 6,
            'subcategory_id' => 2,
            'help_text' => '.',
            'is_optional' => 1,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 4,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -4,
        ]);

        $question = Question::create([
            'description' => '¿Se cuenta con un cálculo de requerimientos enfocado en la demanda del usuario y en el plan de crecimiento de HW?',
            'order' => 1,
            'category_id' => 7,
            'subcategory_id' => 1,
            'help_text' => NULL,
            'is_optional' => 1,
            'has_description_field' => 0,
            'description_label' => NULL
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 30,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -30,
        ]);

        $question = Question::create([
            'description' => '¿Se cuenta con un plan de crecimiento para el HW?',
            'order' => 2,
            'category_id' => 7,
            'subcategory_id' => 1,
            'help_text' => NULL,
            'is_optional' => 1,
            'has_description_field' => 0,
            'description_label' => NULL
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 20,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -20,
        ]);

        $question = Question::create([
            'description' => '¿Se cuenta con redundancia?',
            'order' => 3,
            'category_id' => 7,
            'subcategory_id' => 1,
            'help_text' => NULL,
            'is_optional' => 1,
            'has_description_field' => 0,
            'description_label' => NULL
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 30,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -30,
        ]);

        $question = Question::create([
            'description' => '¿Se tienen métricas de uso y dispoiniblidad del servicio en línea?',
            'order' => 4,
            'category_id' => 7,
            'subcategory_id' => 1,
            'help_text' => NULL,
            'is_optional' => 1,
            'has_description_field' => 0,
            'description_label' => NULL
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 20,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -20,
        ]);

        $question = Question::create([
            'description' => '¿Se realizan pruebas de seguridad informática?',
            'order' => 1,
            'category_id' => 7,
            'subcategory_id' => 2,
            'help_text' => NULL,
            'is_optional' => 1,
            'has_description_field' => 0,
            'description_label' => NULL
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 30,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -30,
        ]);

        $question = Question::create([
            'description' => '¿Se llevan a cabo procesos de respaldo acordes con una metodología conocida?',
            'order' => 2,
            'category_id' => 7,
            'subcategory_id' => 2,
            'help_text' => NULL,
            'is_optional' => 1,
            'has_description_field' => 0,
            'description_label' => NULL
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 20,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -20,
        ]);

        $question = Question::create([
            'description' => '¿Se cuenta con al menos tres copias de cada elemento, en ubicaciones físicas separadas, siento al menos una de estas, en otra ciudad?',
            'order' => 3,
            'category_id' => 7,
            'subcategory_id' => 2,
            'help_text' => NULL,
            'is_optional' => 1,
            'has_description_field' => 0,
            'description_label' => NULL
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 50,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -50,
        ]);

        $question = Question::create([
            'description' => '¿El repositorio cuenta con un nombre identificable?',
            'order' => 1,
            'category_id' => 8,
            'subcategory_id' => 1,
            'help_text' => '.',
            'is_optional' => 0,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 4,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -4,
        ]);

        $question = Question::create([
            'description' => '¿Se cuenta con una URL propia y amigable?',
            'order' => 2,
            'category_id' => 8,
            'subcategory_id' => 1,
            'help_text' => '
            Se entiende por URL amigable aquel que está compuesto únicamente por la dirección del servidor web. Por ejemplo
            
            \r\n
            http//repositorio.concytec.gob.pe
            
            \r\n
            http//revistas.unmsm.edu.pe
            
            \r\n
            Se valora que en esta dirección aparezca el nombre del repositorio..
            
            Especificar la URL.
            
            ',
            'is_optional' => 0,
            'has_description_field' => 1,
            'description_label' => 'Especificar'
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 3,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -3,
        ]);


        $question = Question::create([
            'description' => '¿Se usan identificadores persistentes?',
            'order' => 10,
            'category_id' => 8,
            'subcategory_id' => 1,
            'help_text' => '.',
            'is_optional' => 1,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 3,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -3,
        ]);

        $question = Question::create([
            'description' => '¿El repositorio se encuentra en OpenDOAR?',
            'order' => 4,
            'category_id' => 8,
            'subcategory_id' => 1,
            'help_text' => '
            Para conseguir la mayor visibilidad se recomienda el registro en todos ellos.
            En caso afirmativo, incluir el enlace.
            
            ',
            'is_optional' => 0,
            'has_description_field' => 1,
            'description_label' => 'Incluir el enlace'
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 3,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -3,
        ]);


        $question = Question::create([
            'description' => '¿Se cuenta con acuerdos con otras bibliotecas para intercambio de ligas o metadatos?',
            'order' => 10,
            'category_id' => 8,
            'subcategory_id' => 1,
            'help_text' => '.',
            'is_optional' => 1,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 3,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -3,
        ]);

        $question = Question::create([
            'description' => '¿Se cubre con normas internacionales de interoperabilidad y cosecha con Google Académico?',
            'order' => 4,
            'category_id' => 8,
            'subcategory_id' => 1,
            'help_text' => '
            \r\n
            
            \r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n
            \r\n
            Recolector
            
            \r\n	\r\n
            Incluir el enlace
            
            \r\n
            \r\n
            Google Académico
            
            \r\n	 
            \r\n
            OpenAire
            
            \r\n	 
            \r\n
            Base
            
            \r\n	 
            \r\n
            Microsoft Academic
            
            \r\n	 
            \r\n
            \r\n
            \r\n
             \r\n\r\n\r\n',
            'is_optional' => 0,
            'has_description_field' => 1,
            'description_label' => 'Incluir el enlace'
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 2,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -2,
        ]);


        $question = Question::create([
            'description' => '¿Se cumple con estándares de inclusión y accesibilidad? \r\nComo el WCAG.2',
            'order' => 10,
            'category_id' => 8,
            'subcategory_id' => 1,
            'help_text' => '.',
            'is_optional' => 1,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 4,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -4,
        ]);

        $question = Question::create([
            'description' => '¿Se utiliza completamente el esquema de metadatos de acuerdo con algún estándar?',
            'order' => 1,
            'category_id' => 8,
            'subcategory_id' => 2,
            'help_text' => '.',
            'is_optional' => 1,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 6,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -6,
        ]);

        $question = Question::create([
            'description' => '¿El sistema utiliza protocolos como OAI o Sword?',
            'order' => 1,
            'category_id' => 8,
            'subcategory_id' => 2,
            'help_text' => '.',
            'is_optional' => 1,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 6,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -6,
        ]);

        $question = Question::create([
            'description' => '¿Se realizan campañas de difusión del RI hacia la comunidad externa?',
            'order' => 1,
            'category_id' => 9,
            'subcategory_id' => 1,
            'help_text' => '.',
            'is_optional' => 1,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 2,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -2,
        ]);

        $question = Question::create([
            'description' => '¿Se cuenta con métricas de estas campañas, así como con funciones que permitan rastrear los resultados traducidos en visitas y uso del RI?',
            'order' => 2,
            'category_id' => 9,
            'subcategory_id' => 1,
            'help_text' => '.',
            'is_optional' => 1,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 4,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -4,
        ]);

        $question = Question::create([
            'description' => '¿Se cuenta con programas de capacitación en Ciencia Abierta y Acceso Abierto?',
            'order' => 3,
            'category_id' => 9,
            'subcategory_id' => 1,
            'help_text' => '.',
            'is_optional' => 1,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 1,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -1,
        ]);

        $question = Question::create([
            'description' => '¿Se cuenta con programas de capacitación en Propiedad Intelectual y uso de licencias CC?',
            'order' => 4,
            'category_id' => 9,
            'subcategory_id' => 1,
            'help_text' => '.',
            'is_optional' => 1,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 1,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -1,
        ]);

        $question = Question::create([
            'description' => '¿Se cuenta con programas de concientización y formación en temas de inclusión y accesibilidad?',
            'order' => 5,
            'category_id' => 9,
            'subcategory_id' => 1,
            'help_text' => '.',
            'is_optional' => 1,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 2,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -2,
        ]);

        $question = Question::create([
            'description' => '¿Se realizan campañas de sensiblización con respecto a la PD?',
            'order' => 1,
            'category_id' => 9,
            'subcategory_id' => 2,
            'help_text' => '.',
            'is_optional' => 1,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 2,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -2,
        ]);

        $question = Question::create([
            'description' => '¿Se cuenta con programas de capacitación en PD?',
            'order' => 2,
            'category_id' => 9,
            'subcategory_id' => 2,
            'help_text' => '.',
            'is_optional' => 1,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 3,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -3,
        ]);

        $question = Question::create([
            'description' => '¿Se cuenta con programas de formación y fomento al autodepósito?',
            'order' => 3,
            'category_id' => 9,
            'subcategory_id' => 2,
            'help_text' => '.',
            'is_optional' => 1,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 5,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -5,
        ]);

        $question = Question::create([
            'description' => '¿Se cuenta con programas de formación en formatos abiertos y transformación de contenidos, incluyendo XML?',
            'order' => 500,
            'category_id' => 9,
            'subcategory_id' => 2,
            'help_text' => '
            Parámetros de puntuación\r\n
            
            Considera si la adminsitración del repositorio ha implementado programas de formación a autores en el tema, incluyendo a editores de revistas, académicos, investigadores, bibliotecarios y alumnos.
            
            MÁXIMA: 20
            
            Se debe contar con programas desarrollados e impartiéndose a los perfiles mencionados durante al menos seis meses, logrando una cobertura mínima del 15% de la comunidad académica por semestre.
            
            INTERMEDIA: 10
            
            Se ha comenzado con programas de formación, sin embargo, el proceso lleva menos de seis meses o no se está logrando la cobertura mínima sugerida.
            
            NULA: 0
            
            Se tienen los planes, pero no se ha indiciado el trabajo.
            
            NEGATIVA: -10
            
            
            
            MÍNIMA: - 20
            
            
            ',
            'is_optional' => 0,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 45,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -45,
        ]);


        $question = Question::create([
            'description' => '¿Existe una autorización por el autor o el titular de los derechos que permite la distribución de contenidos?',
            'order' => 500,
            'category_id' => 1,
            'subcategory_id' => 2,
            'help_text' => '
            Para cada documento se debe obtener el permiso del autor o del titular de los derechos de explotación para difundirlo a través del repositorio en las condiciones preestablecidas (licencias Creative Commons, contratos de edición, autorizaciones, etc.). Este permiso puede ser individual (por ejemplo, el depósito de una comunicación a un congreso) o puede darse de forma colectiva para un grupo de documentos (por ejemplo, las revistas que asignan una licencia Creative Commons a todos sus artículos).
            
            \r\n
            \r\n
             \r\n',
            'is_optional' => 0,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 90,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -90,
        ]);


        $question = Question::create([
            'description' => '¿Existe un documento de acceso público donde se ayude al autor a decidir si puede o no depositar el preprint o postprint del documento en otros repositorios? ',
            'order' => 502,
            'category_id' => 1,
            'subcategory_id' => 1,
            'help_text' => 'Por ejemplo: un enlace a las políticas editoriales de la institución en la base internacional SHERPA/Romeo\r\n
            
            Especificar la URL
            ',
            'is_optional' => 0,
            'has_description_field' => 1,
            'description_label' => 'Añadir URL del documento'
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 25,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -25,
        ]);


        $question = Question::create([
            'description' => '¿Se actualizan los datos del protocolo OAI-PMH de manera diaria?',
            'order' => 500,
            'category_id' => 8,
            'subcategory_id' => 2,
            'help_text' => '
            Actualización del protocolo OAI-PMH.
            ',
            'is_optional' => 0,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 25,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -25,
        ]);


        $question = Question::create([
            'description' => '¿Se identifican los recursos de investigación a través de uno o varios sets correspondientes a comunidades y colecciones?',
            'order' => 10,
            'category_id' => 8,
            'subcategory_id' => 1,
            'help_text' => '
            Recursos de investigación.
            \r\n
            Ejemplo: http://repositorio.concytec.gob.pe/oai/request?verb=ListSets 
            
            ',
            'is_optional' => 0,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 3,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -3,
        ]);


        $question = Question::create([
            'description' => '¿El correo electrónico del administrador del repositorio está disponible en la etiqueta AdminEmail dentro de la respuesta a una orden Identify?',
            'order' => 9,
            'category_id' => 8,
            'subcategory_id' => 1,
            'help_text' => '
            Correo electrónico del administrador del repositorio.
            
            \r\n
            Se puede ver el contacto en el identificador del protocolo oai-pmh (http://repositorio.concytec.gob.pe/oai/request?verb=Identify). En DSpace la configuración se realiza mediante el campo mail.admin del archivo build.properties. (Requiere actualizar la instalación con ant update).
            
            ',
            'is_optional' => 0,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 2,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -2,
        ]);


        $question = Question::create([
            'description' => '¿La entrega de registros a través del protocolo OAI-PMH es progresiva a través de lotes?',
            'order' => 502,
            'category_id' => 8,
            'subcategory_id' => 2,
            'help_text' => '
            Entrega de registros.
            \r\n
            P.ej., una consulta a /oai/request?verb=ListRecords&metadataPrefix=oai_dc no debería devolver todos los registros sino sólo un número limitado de ellos, tales como los primeros 100.
            
            ',
            'is_optional' => 0,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 25,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -25,
        ]);


        $question = Question::create([
            'description' => '¿El tamaño de los lotes para la entrega de registros está dentro del rango de 100-500 registros?',
            'order' => 501,
            'category_id' => 8,
            'subcategory_id' => 2,
            'help_text' => '
            Tamaño de los lotes para la entrega de registros.
            
            \r\n
            Está comprobado en la práctica que un número de elementos entre este rango agiliza los procesos de recolección y evita sobrecargas en los repositorios.
            
            ',
            'is_optional' => 0,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 15,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -15,
        ]);


        $question = Question::create([
            'description' => '¿El repositorio institucional usa el formato de metadatos OAI_DC?',
            'order' => 10,
            'category_id' => 8,
            'subcategory_id' => 1,
            'help_text' => '
            El objetivo principal de utilizar un formato de metadatos común es facilitar la interoperabilidad.
            
            ',
            'is_optional' => 0,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 4,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -4,
        ]);


        $question = Question::create([
            'description' => '¿El repositorio institucional usa el formato de metadatos XOAI?',
            'order' => 11,
            'category_id' => 8,
            'subcategory_id' => 1,
            'help_text' => '
            El objetivo principal de utilizar el formato XOAI es facilitar la interoperabilidad a nivel de esquema, elementos y también calificadores.
            
            ',
            'is_optional' => 0,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 4,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -4,
        ]);


        $question = Question::create([
            'description' => '¿Todos los registros contienen el elemento AUTOR (dc.contributor.author)?',
            'order' => 12,
            'category_id' => 8,
            'subcategory_id' => 1,
            'help_text' => '
            Entidad principal responsable del contenido del recurso, ya sea personal o institucional.  
            
            ',
            'is_optional' => 0,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 2,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -2,
        ]);


        $question = Question::create([
            'description' => '¿Todos los registros de trabajos de investigación conducentes a grados o títulos contienen el elemento NÚMERO DE DOCUMENTO DE IDENTIDAD DEL AUTOR (renati.author.* [dni, cext, pasaporte, cedula])?',
            'order' => 13,
            'category_id' => 8,
            'subcategory_id' => 1,
            'help_text' => '
            Tipo de documento de identidad asociado al elemento autor. 
            
            ',
            'is_optional' => 0,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 2,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -2,
        ]);


        $question = Question::create([
            'description' => '¿Todos los registros contienen el elemento TÍTULO (dc.title)?',
            'order' => 14,
            'category_id' => 8,
            'subcategory_id' => 1,
            'help_text' => '
            Nombre que se da al recurso. Normalmente, el título es un nombre por el cual el recurso es conocido formalmente.  
            
            ',
            'is_optional' => 0,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 2,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -2,
        ]);


        $question = Question::create([
            'description' => '¿Todos los registros contienen el elemento EDITORIAL (dc.publisher)?',
            'order' => 15,
            'category_id' => 8,
            'subcategory_id' => 1,
            'help_text' => '
            Entidad responsable de hacer que el recurso esté disponible. Una persona, una organización o un servicio pueden ser un editor.  
            
            ',
            'is_optional' => 0,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 2,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -2,
        ]);


        $question = Question::create([
            'description' => '¿Todos los registros de trabajos de investigación conducentes a grados o títulos contienen el elemento PAÍS DE PUBLICACIÓN (dc.publisher.country)?',
            'order' => 16,
            'category_id' => 8,
            'subcategory_id' => 1,
            'help_text' => '
            País de publicación del recurso. 
            
            ',
            'is_optional' => 0,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 2,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -2,
        ]);


        $question = Question::create([
            'description' => '¿Todos los registros contienen el elemento FECHA DE PUBLICACIÓN (dc.date.issued)?',
            'order' => 17,
            'category_id' => 8,
            'subcategory_id' => 1,
            'help_text' => '
            Fecha de publicación del recurso.
            
            ',
            'is_optional' => 0,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 2,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -2,
        ]);


        $question = Question::create([
            'description' => '¿Todos los registros contienen el elemento TIPO DE PUBLICACIÓN (dc.type)?',
            'order' => 18,
            'category_id' => 8,
            'subcategory_id' => 1,
            'help_text' => '
            Tipo de resultado científico del cual el recurso es una manifestación.
            
            ',
            'is_optional' => 0,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 2,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -2,
        ]);


        $question = Question::create([
            'description' => '¿El elemento IDIOMA (dc.language.iso) se encuentra conforme al vocabulario establecido?',
            'order' => 18,
            'category_id' => 8,
            'subcategory_id' => 1,
            'help_text' => '
            Un código que identifica el idioma del contenido intelectual del recurso. Para este elemento se establece como vocabulario: ISO 639-2. Ver codificación https://www.loc.gov/standards/iso639-2/php/code_list.php
            
            ',
            'is_optional' => 0,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 2,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -2,
        ]);


        $question = Question::create([
            'description' => '¿Todos los registros contienen el elemento NIVEL DE ACCESO (dc.rights)? ',
            'order' => 19,
            'category_id' => 8,
            'subcategory_id' => 1,
            'help_text' => '
            Información sobre los derechos o modo de acceso al contenido del recurso.
            
            ',
            'is_optional' => 0,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 2,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -2,
        ]);


        $question = Question::create([
            'description' => '¿Todos los registros contienen el elemento CONDICIÓN DE LA LICENCIA (dc.rights.uri)?',
            'order' => 20,
            'category_id' => 8,
            'subcategory_id' => 1,
            'help_text' => '
            Información sobre los derechos de licencia mantenidos en y sobre el recurso. 
            
            ',
            'is_optional' => 0,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 2,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -2,
        ]);


        $question = Question::create([
            'description' => '¿Todos los registros bajo embargo contienen el elemento FECHA DE FIN DE EMBARGO (dc.date.embargoEnd)?',
            'order' => 21,
            'category_id' => 8,
            'subcategory_id' => 1,
            'help_text' => '
            Fecha en que el recurso será (o fue) puesto disponible en acceso abierto.  
            
            ',
            'is_optional' => 0,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 2,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -2,
        ]);


        $question = Question::create([
            'description' => '¿Todos los registros contienen el elemento RESUMEN (dc.description.abstract)?',
            'order' => 22,
            'category_id' => 8,
            'subcategory_id' => 1,
            'help_text' => '
            Extracto o síntesis del recurso. Se debe incluir un resumen (abstract) de la publicación, aunque se puede ofrecer más información siempre y cuando no se utilice para indicar información que corresponda a otros campos.
            
            ',
            'is_optional' => 0,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 2,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -2,
        ]);


        $question = Question::create([
            'description' => '¿Todos los registros contienen el elemento MATERIA (dc.subject)?',
            'order' => 23,
            'category_id' => 8,
            'subcategory_id' => 1,
            'help_text' => '
            Palabras clave, descriptores y/o códigos de clasificación que describen el contenido intelectual del recurso. Obligatorio para trabajos de investigación conducentes a grados o títulos.
            
            ',
            'is_optional' => 0,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 2,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -2,
        ]);


        $question = Question::create([
            'description' => '¿Todos los registros contienen el elemento CAMPO DEL CONOCIMIENTO OCDE (dc.subject.ocde) conforme al vocabulario establecido?',
            'order' => 24,
            'category_id' => 8,
            'subcategory_id' => 1,
            'help_text' => '
            Código(s) asignado(s) según la clasificación de Campos de Investigación y Desarrollo (FORD, por sus siglas en inglés) establecida en el Manual de Frascati de la OCDE, según las URIs del vocabulario disponible en: http://purl.org/pe-repo/ocde/ford
            
            ',
            'is_optional' => 0,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 2,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -2,
        ]);


        $question = Question::create([
            'description' => '¿Todos los registros contienen un elemento IDENTIFICADOR HANDLE (dc.identifier.uri) válido?',
            'order' => 24,
            'category_id' => 8,
            'subcategory_id' => 1,
            'help_text' => '
            El identificador Handle, cuando es ingresado en un navegador web, debe redirigir automáticamente a la ubicación del recurso identificado. Obligatorio para repositorios institucionales, de tesis y de datos. En el caso de portales de revistas aplica el uso de DOI.
            
            ',
            'is_optional' => 0,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 2,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -2,
        ]);


        $question = Question::create([
            'description' => '¿Todos los registros contienen el elemento DOI (dc.identifier.doi)?',
            'order' => 25,
            'category_id' => 8,
            'subcategory_id' => 1,
            'help_text' => '
            ¿Todos los registros contienen el elemento DOI (dc.identifier.doi)?
            
            ',
            'is_optional' => 0,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 2,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -2,
        ]);


        $question = Question::create([
            'description' => '¿Todos los registros de libros y monografías contienen el elemento ISBN (dc.identifier.isbn)?',
            'order' => 26,
            'category_id' => 8,
            'subcategory_id' => 1,
            'help_text' => '
            Identificador ISBN (International Standard Book Number) del recurso. Obligatorio si es aplicable.
            
            ',
            'is_optional' => 0,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 2,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -2,
        ]);


        $question = Question::create([
            'description' => '¿Todos los registros contienen el elemento RECURSO DEL CUAL FORMA PARTE (dc.relation.isPartOf)?',
            'order' => 27,
            'category_id' => 8,
            'subcategory_id' => 1,
            'help_text' => '
            Identificador de un recurso relacionado en el que el recurso descrito se incluye física o lógicamente. Obligatorio para relacionar artículos y/o similares en revistas, con el prefijo urn:issn: seguido del código ISSN, incluyendo el guión intermedio. Usar preferentemente el ISSN-L, el cual puede verificarse en: https://portal.issn.org
            
            ',
            'is_optional' => 0,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 2,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -2,
        ]);


        $question = Question::create([
            'description' => '¿Todos los registros de trabajos de investigación conducentes a grados o títulos contienen el elemento ASESOR (dc.contributor.advisor)?',
            'order' => 28,
            'category_id' => 8,
            'subcategory_id' => 1,
            'help_text' => '
            Persona responsable de la asesoría de la investigación.
            
            ',
            'is_optional' => 0,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 2,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -2,
        ]);


        $question = Question::create([
            'description' => '¿Todos los registros de trabajos de investigación conducentes a grados o títulos contienen el elemento ORCID DEL ASESOR (renati.advisor.orcid)?',
            'order' => 29,
            'category_id' => 8,
            'subcategory_id' => 1,
            'help_text' => '
            ORCID del asesor de la investigación. Es un identificador persistente del autor de alcance global.
            
            ',
            'is_optional' => 0,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 2,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -2,
        ]);


        $question = Question::create([
            'description' => '¿Todos los registros de trabajos de investigación conducentes a grados o títulos contienen el elemento NÚMERO DE DOCUMENTO DE IDENTIDAD DEL ASESOR (renati.advisor.* [dni, cext, pasaporte, cedula])?',
            'order' => 30,
            'category_id' => 8,
            'subcategory_id' => 1,
            'help_text' => '
            Documento de identidad del asesor de la investigación. Es un dato que debe registrarse asociado al campo asesor. 
            
            ',
            'is_optional' => 0,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 2,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -2,
        ]);


        $question = Question::create([
            'description' => '¿Todos los registros de trabajos de investigación conducentes a grados o títulos contienen el elemento TIPO DE TRABAJO DE INVESTIGACIÓN (renati.type)?',
            'order' => 31,
            'category_id' => 8,
            'subcategory_id' => 1,
            'help_text' => '
            Tipo de trabajo de investigación conducente a la obtención de un grado académico y/o título profesional en el Perú, según el Reglamento RENATI. 
            
            ',
            'is_optional' => 0,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 2,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -2,
        ]);


        $question = Question::create([
            'description' => '¿Todos los registros de trabajos de investigación conducentes a grados o títulos contienen el elemento NOMBRE DEL GRADO (thesis.degree.name)?',
            'order' => 32,
            'category_id' => 8,
            'subcategory_id' => 1,
            'help_text' => '
            Denominación asociada al grado académico. 
            
            Especificar URL
            
            ',
            'is_optional' => 0,
            'has_description_field' => 1,
            'description_label' => 'Añadir URL'
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 2,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -2,
        ]);


        $question = Question::create([
            'description' => '¿Todos los registros de trabajos de investigación conducentes a grados o títulos contienen el elemento GRADO ACADÉMICO O TÍTULO PROFESIONAL (renati.level)?',
            'order' => 33,
            'category_id' => 8,
            'subcategory_id' => 1,
            'help_text' => '
            Grado académico y/o título profesional otorgado en el Perú, según el Reglamento RENATI.
            
            Especificar URL.
            
            ',
            'is_optional' => 0,
            'has_description_field' => 1,
            'description_label' => 'Ejemplificar. Añadir URL.'
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 2,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -2,
        ]);


        $question = Question::create([
            'description' => '¿Todos los registros de trabajos de investigación conducentes a grados o títulos contienen el elemento NOMBRE DEL PROGRAMA (thesis.degree.discipline)? ',
            'order' => 34,
            'category_id' => 8,
            'subcategory_id' => 1,
            'help_text' => '
            Nombre del programa de educación superior conducente al grado académico y/o título profesional.
            
            Especificar URL.
            
            ',
            'is_optional' => 0,
            'has_description_field' => 1,
            'description_label' => 'Ejemplificar. Añadir URL.'
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 2,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -2,
        ]);


        $question = Question::create([
            'description' => '¿Todos los registros de trabajos de investigación conducentes a grados o títulos contienen el elemento CÓDIGO DEL PROGRAMA (renati.discipline)?',
            'order' => 35,
            'category_id' => 8,
            'subcategory_id' => 1,
            'help_text' => '
            Clasificación del programa de educación superior conducente al grado académico y/o título profesional. 
            
            Especificar URL.
            
            ',
            'is_optional' => 0,
            'has_description_field' => 1,
            'description_label' => 'Ejemplificar. Añadir URL.'
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 2,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -2,
        ]);


        $question = Question::create([
            'description' => '¿Todos los registros de trabajos de investigación conducentes a grados o títulos contienen el elemento INSTITUCIÓN OTORGANTE DEL GRADO (thesis.degree.grantor)?',
            'order' => 36,
            'category_id' => 8,
            'subcategory_id' => 1,
            'help_text' => '
            Denominación oficial de la institución que ha otorgado el grado académico y/o título profesional. 
            
            Especificar URL.
            
            ',
            'is_optional' => 0,
            'has_description_field' => 1,
            'description_label' => 'Ejemplificar. Añadir URL.'
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 2,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -2,
        ]);


        $question = Question::create([
            'description' => '¿Todos los registros de trabajos de investigación conducentes a grados o títulos contienen el elemento JURADO (renati.juror)?',
            'order' => 37,
            'category_id' => 8,
            'subcategory_id' => 1,
            'help_text' => '
            Nombre de los integrantes del jurado evaluador del trabajo académico conducente al grado académico y/o título profesional.
            
            Especificar URL.
            
            ',
            'is_optional' => 0,
            'has_description_field' => 1,
            'description_label' => 'Ejemplificar. Añadir URL.'
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 2,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -2,
        ]);


        $question = Question::create([
            'description' => 'Nombre de los integrantes del jurado evaluador del trabajo académico conducente al grado académico y/o título profesional.',
            'order' => 501,
            'category_id' => 1,
            'subcategory_id' => 1,
            'help_text' => '
            El repositorio facilitará al autor el cumplimiento con la normativa vigente. En la ingesta de materiales se debe obtener la declaración del autor de que ha respetado los derechos de propiedad intelectual a terceros. Sería, por ejemplo, el caso de las tesis doctorales, etc.
            
            ',
            'is_optional' => 0,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 20,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -20,
        ]);


        $question = Question::create([
            'description' => '¿Se incluye la información sobre los derechos de autor en los metadatos exportados por el repositorio?',
            'order' => 500,
            'category_id' => 1,
            'subcategory_id' => 1,
            'help_text' => '
            Se valora en este punto que los metadatos en Dublin Core exportados por el repositorio deben incluir definido y completado el campo rights con todas las declaraciones de administración de derechos para acceder o utilizar el objeto, o una referencia a un servicio que proporcione esta información. (Ver directrices de ALICIA)
            
            ',
            'is_optional' => 0,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 25,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -25,
        ]);


        $question = Question::create([
            'description' => '¿Existe un documento de acceso público, fácilmente accesible desde la página principal del repositorio, en el que se establece de forma clara qué personas dentro de la institución pueden aportar contenidos, qué tipos de contenidos son aceptados (artículos publicados en revistas, informes, etc.) así como los formatos de los ficheros permitidos (PDF, Word, etc.)?',
            'order' => 502,
            'category_id' => 3,
            'subcategory_id' => 1,
            'help_text' => '
            En caso afirmativo, añadir la URL.
            
            ',
            'is_optional' => 0,
            'has_description_field' => 1,
            'description_label' => 'Añadir URL del documento'
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 45,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -45,
        ]);


        $question = Question::create([
            'description' => '¿Existe un documento de acceso público, fácilmente accesible desde la página principal del repositorio, donde se especifica cómo y en qué medida o con qué limitaciones dichos recolectores pueden utilizar los metadatos recolectados?',
            'order' => 500,
            'category_id' => 3,
            'subcategory_id' => 2,
            'help_text' => '
            Los metadatos almacenados en el repositorio pueden ser recolectados por agregadores o proveedores de servicios.
            
            Incluir la URL.
            
            ',
            'is_optional' => 0,
            'has_description_field' => 1,
            'description_label' => 'Añadir URL del documento'
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 45,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -45,
        ]);


        $question = Question::create([
            'description' => '¿Existe una oferta de contacto y asesoría visible?',
            'order' => 500,
            'category_id' => 9,
            'subcategory_id' => 1,
            'help_text' => '
            Se valora la existencia de diferentes medios de contacto (redes sociales, correo electrónico, teléfono, etc.) para realizar asesoramiento telefónico y/o personal a los autores.
            
            Especificar.
            
            ',
            'is_optional' => 0,
            'has_description_field' => 1,
            'description_label' => 'Especificar'
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 45,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -45,
        ]);


        $question = Question::create([
            'description' => '¿El repositorio refleja en un lugar visible su compromiso con el acceso abierto?',
            'order' => 501,
            'category_id' => 9,
            'subcategory_id' => 1,
            'help_text' => '
            En caso de que la institución cuente con una política sobre acceso abierto aparecerá enlazada desde el repositorio.
            
            ',
            'is_optional' => 0,
            'has_description_field' => 1,
            'description_label' => 'Añadir URL.'
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 45,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -45,
        ]);


        $question = Question::create([
            'description' => '¿Existe un enlace desde la página inicial de la institución al repositorio?',
            'order' => 38,
            'category_id' => 8,
            'subcategory_id' => 1,
            'help_text' => '
            Especificar el enlace en caso afirmativo.',
            'is_optional' => 0,
            'has_description_field' => 1,
            'description_label' => 'Especificar'
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 2,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -2,
        ]);


        $question = Question::create([
            'description' => '¿El repositorio ha sido registrado en directorios y recolectores siempre con el mismo nombre?',
            'order' => 38,
            'category_id' => 8,
            'subcategory_id' => 1,
            'help_text' => '
            Por ejemplo: Repositorio Institucional CONCYTEC. Se valora que el repositorio tenga un nombre propio que lo identifique unívocamente.
            
            Escribir el nombre en el campo indicado.
            
            ',
            'is_optional' => 0,
            'has_description_field' => 1,
            'description_label' => '¿Cuál es ese nombre?'
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 3,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -3,
        ]);


        $question = Question::create([
            'description' => '¿Al menos el 75% de los recursos textuales de investigación que ofrece el repositorio se encuentran en acceso abierto?',
            'order' => 500,
            'category_id' => 5,
            'subcategory_id' => 1,
            'help_text' => '
            .',
            'is_optional' => 0,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 90,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -90,
        ]);


        $question = Question::create([
            'description' => '¿La Institución se ha adherido a alguna de las siguientes declaraciones en favor del acceso abierto?\r\nDeclaración de Budapest\r\n\r\nDeclaración de Berlín\r\n\r\nDeclaración de Bethesda',
            'order' => 501,
            'category_id' => 3,
            'subcategory_id' => 2,
            'help_text' => '
            Especificar cuáles:
            
            Declaración de Budapest
            
            \r\n
            Declaración de Berlín \r\n
            Declaración de Bethesda
            
            ',
            'is_optional' => 0,
            'has_description_field' => 1,
            'description_label' => 'Indicar en cuál(es)'
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 45,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -45,
        ]);


        $question = Question::create([
            'description' => '¿Los logs del servidor web donde está alojado el repositorio se archivan de forma permanente?',
            'order' => 0,
            'category_id' => 6,
            'subcategory_id' => 2,
            'help_text' => '
            .',
            'is_optional' => 0,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 90,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -90,
        ]);


        $question = Question::create([
            'description' => '¿Se cuenta con un servicio de estadísticas integral sobre el uso de los documentos almacenados? ',
            'order' => 500,
            'category_id' => 6,
            'subcategory_id' => 1,
            'help_text' => '
            Se proporcionan de forma pública datos de accesos y descargas de forma individualizada para cada documento almacenado, así como el comportamiento de los usuarios en cuanto a búsqueda, forma de acceso al repositorio, número de clicks, palabras clave mayormente utilizadas, autores consultados, etc.
            
            Especificar la URL.
            
            ',
            'is_optional' => 0,
            'has_description_field' => 1,
            'description_label' => 'Especificar URL.'
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 45,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -45,
        ]);


        $question = Question::create([
            'description' => '¿Se realiza un filtrado de accesos de los robots o motores de búsqueda?',
            'order' => 501,
            'category_id' => 6,
            'subcategory_id' => 1,
            'help_text' => '
            .',
            'is_optional' => 0,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 45,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -45,
        ]);


        $question = Question::create([
            'description' => '¿Existe un procedimiento establecido sobre la elaboración de copias de seguridad, tanto del software sobre el que funciona el repositorio, los metadatos y los documentos propiamente dichos?',
            'order' => 500,
            'category_id' => 4,
            'subcategory_id' => 1,
            'help_text' => '
            Especificar URL.',
            'is_optional' => 0,
            'has_description_field' => 1,
            'description_label' => 'Especificar URL.'
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 45,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -45,
        ]);


        $question = Question::create([
            'description' => '¿Existen iniciativas para fomentar la visibilidad del repositorio dentro de la propia institución?',
            'order' => 44,
            'category_id' => 9,
            'subcategory_id' => 2,
            'help_text' => '
            Entre estas, se valora la existencia de: una oferta de sesiones de formación e información sobre el depósito de los documentos en el repositorio; acciones de fomento del acceso abierto mediante organización de eventos, presentaciones, campañas en facultades y departamentos, semanas de acceso abierto, seminarios, pósters y afiches; utilización de los medios de comunicación; utilización de redes sociales, así como guías y materiales de soporte y asesoramiento disponibles para los autores, etc.
            
            Especificar cuáles.',
            'is_optional' => 0,
            'has_description_field' => 1,
            'description_label' => 'Especificar cuáles'
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 45,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -45,
        ]);


        $question = Question::create([
            'description' => '¿Existe un documento de acceso público, fácilmente accesible desde la página principal del repositorio, en el que la institución expresa su compromiso en hacer disponibles los contenidos de forma permanente y tomar las medidas de preservación (tales como migraciones) necesarias para garantizar el acceso a los mismos?',
            'order' => 1,
            'category_id' => 4,
            'subcategory_id' => 1,
            'help_text' => '
            Añadir la URL del documento.',
            'is_optional' => 0,
            'has_description_field' => 1,
            'description_label' => 'Añadir URL del documento'
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 45,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -45,
        ]);


        $question = Question::create([
            'description' => '¿El autor reconoce que al depositar no está infringiendo ningún derecho de propiedad intelectual?',
            'order' => 1,
            'category_id' => 1,
            'subcategory_id' => 1,
            'help_text' => '
            El repositorio facilitará al autor el cumplimiento con la normativa vigente. En la ingesta de materiales se debe obtener la declaración del autor de que ha respetado los derechos de propiedad intelectual a terceros. Sería, por ejemplo, el caso de las tesis doctorales, etc.
            
            ',
            'is_optional' => 0,
            'has_description_field' => 1,
            'description_label' => 'Especificar cómo y para qué tipo de materiales'
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 20,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -20,
        ]);


        $question = Question::create([
            'description' => '¿Se proveen los datos a través del protocolo OAI-PMH?',
            'order' => 1,
            'category_id' => 8,
            'subcategory_id' => 2,
            'help_text' => '
            .',
            'is_optional' => 0,
            'has_description_field' => 0,
            'description_label' => ''
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 25,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -25,
        ]);


        $question = Question::create([
            'description' => '¿El repositorio se encuentra en ROAR?',
            'order' => 3,
            'category_id' => 8,
            'subcategory_id' => 1,
            'help_text' => '
            .',
            'is_optional' => 0,
            'has_description_field' => 1,
            'description_label' => 'Incluir el enlace'
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 3,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -3,
        ]);


        $question = Question::create([
            'description' => '¿El repositorio se encuentra en DuraSpace?',
            'order' => 3,
            'category_id' => 8,
            'subcategory_id' => 1,
            'help_text' => '
            .',
            'is_optional' => 0,
            'has_description_field' => 1,
            'description_label' => 'Incluir el enlace'
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 4,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -4,
        ]);


        $question = Question::create([
            'description' => '¿El repositorio se encuentra en otro directorio especializado?',
            'order' => 3,
            'category_id' => 8,
            'subcategory_id' => 1,
            'help_text' => '
            .',
            'is_optional' => 0,
            'has_description_field' => 1,
            'description_label' => 'Incluir el enlace'
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 4,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -4,
        ]);


        $question = Question::create([
            'description' => '¿Se cubre con normas internacionales de interoperabilidad y cosecha con Base?',
            'order' => 3,
            'category_id' => 8,
            'subcategory_id' => 1,
            'help_text' => '
            .',
            'is_optional' => 0,
            'has_description_field' => 1,
            'description_label' => 'Incluir el enlace'
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 4,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -4,
        ]);


        $question = Question::create([
            'description' => '¿Se cubre con normas internacionales de interoperabilidad y cosecha Microsoft Academic?',
            'order' => 3,
            'category_id' => 8,
            'subcategory_id' => 1,
            'help_text' => '
            .',
            'is_optional' => 0,
            'has_description_field' => 1,
            'description_label' => 'Incluir el enlace'
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 4,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -4,
        ]);


        $question = Question::create([
            'description' => '¿Se cubre con normas internacionales de interoperabilidad y cosecha de otro motor o sistema no antes mencionado?',
            'order' => 3,
            'category_id' => 8,
            'subcategory_id' => 1,
            'help_text' => '
            .',
            'is_optional' => 0,
            'has_description_field' => 1,
            'description_label' => 'Incluir el enlace'
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'Sí',
            'punctuation' => 4,
        ]);

        Choice::create([
            'question_id' => $question->id,
            'description' => 'No',
            'punctuation' => -4,
        ]);
    }
}
