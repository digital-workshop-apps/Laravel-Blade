@if(filled($placeholder))
    <option value="" {{ $selected($valueIsEmpty()) }}>{{ $placeholder }}</option>
@elseif(filled($placeholderDisabled))
    <option value="" {{ $selected($valueIsEmpty()) }} disabled>{{ $placeholderDisabled }}</option>
@endif
