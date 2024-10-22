<?php

namespace Pkl\MyApp\Core;

use Pkl\MyApp\Core\Validation;
use Pkl\MyApp\Core\Sanitization;


class Filter
{
  public function filter(array $data, array $fields, array $messages = []): array
  {
    $sanitization = [];
    $validation = [];

    foreach ($fields as $field => $rules) {
      if (strpos($rules, '|')) {
        [$sanitization[$field], $validation[$field]] = explode('|', $rules, 2);
      } else {
        $sanitization[$field] = $rules;
      }
    }

    $sanitize = new Sanitization();
    $inputs = $sanitize->sanitize($data, $sanitization);
    $validate = new Validation();
    $errors = $validate->validate($inputs, $validation, $messages);

    return [$inputs, $errors];
  }
}
