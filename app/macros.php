<?php

/**
 * Returns first error message for a field, if any, in html
 */
Form::macro('error', function($field_name){
    $html = array();
    $errors = Session::get('errors');

    if(isset($errors) && $errors->has($field_name)){
        array_push($html, '<div data-alert class="alert-box alert radius">');
        array_push($html, '<ul>');
        foreach ($errors->get($field_name) as $message) {
            array_push($html, "<li>$message</li>");
        }
        array_push($html, '</ul>');
        array_push($html, '</div>');
    }

    return implode("", $html);
});


Form::macro('textWidget', function($fieldName, $type='text', $withValue=True)
{
    $html = [];
    $html[] = Form::label($fieldName);
    if ($withValue)
    {
        $html[] = Form::$type($fieldName, Input::old($fieldName));
    }
    else
    {
        $html[] = Form::$type($fieldName);
    }
    $html[] = Form::error($fieldName);
    return implode("", $html);
});
