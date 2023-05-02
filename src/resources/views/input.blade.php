<input {{
    $attributes->merge([
        'id'      => $falseIfEmpty($id),
        'type'    => $type,
        'name'    => $falseIfEmpty($name),
        'value'   => $value,
        'class'   => $validatedClass(),
        'checked' => $checked(),
    ])
}}>
