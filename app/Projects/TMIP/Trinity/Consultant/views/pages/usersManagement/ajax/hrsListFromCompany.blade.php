<option value="">선택하세요</option>
@foreach($hrs as $hr)
    <option value="{{ $hr->id }}">{{ $hr->user->name_kor }}</option>
@endforeach