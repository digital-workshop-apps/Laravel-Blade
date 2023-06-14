<input {{
    $attributes->merge([
        'id'      => $falseIfEmpty($id),
        'type'    => $type,
        'name'    => $falseIfEmpty($name),
        'value'   => $value,
        'checked' => $checked(),
    ])
    ->class([$invalidClass => $errors->has($dotName())])
}}>
