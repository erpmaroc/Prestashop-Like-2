<?php

namespace depexorPackages\Multilanguage;

use depexorPackages\Form\FormElementBuilder;
use depexorPackages\Multilanguage\FormElements\MwEditor;
use depexorPackages\Multilanguage\FormElements\Text;
use depexorPackages\Multilanguage\FormElements\TextArea;
use depexorPackages\Multilanguage\FormElements\TextAreaOption;
use depexorPackages\Multilanguage\FormElements\TextOption;

class MultilanguageFormElementBuilder extends FormElementBuilder
{
    protected $formElementsClasses = [
        'Text'=>Text::class,
        'MwEditor'=>MwEditor::class,
        'TextOption'=>TextOption::class,
        'TextArea'=>TextArea::class,
        'TextAreaOption'=>TextAreaOption::class,
    ];
}
