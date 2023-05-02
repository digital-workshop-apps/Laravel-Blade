<select {{ $attributes->merge(['id' => $falseIfEmpty($id), 'name' => $falseIfEmpty($name), 'class' => $validatedClass()]) }}>
    @include('dwapps-blade-components::select-placeholder')
    @foreach($source as $key => $val)
        <option value="{{ $key }}" {{ $selected($attributeSelected($key)) }}>{{ $val }}</option>
    @endforeach
</select>