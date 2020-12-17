<form method="POST" action="{{route("converter-test.convert")}}">
    @csrf

    @if (Session::has('Converted'))
    <div>
        Converted value = {{ Session::get('Converted') }}
    </div>
    @endif
    <div class="form-control">
        <label for="sum">Сумма</label>
        <input id="sum" name="sum" type="text" class="@error('sum') is-invalid @enderror">
        @error('sum')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-control">
        <label for="currency">From</label>
        <select name="currency_from">
            @foreach ($currencies as $key => $value)
            <option value="{{ $value }}" @if ($key==old('currency_from', $value)) selected="selected" @endif>{{ $value }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-control">
        <label for="currency">To</label>
        <select name="currency_to">
            @foreach ($currencies as $key => $value)
            <option value="{{ $value }}" @if ($key==old('currency_to', $value)) selected="selected" @endif>{{ $value }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-control">
        <button type="submit">Ok</button>
    </div>
</form>