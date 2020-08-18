<label class="form-check-label form-group  mb-1 d-block">
	Backend
	<select name="engine" class="ml-1 custom-select">
		@foreach(['apache','builtin','nginx'] as $e)
			<option value="{{ $e }}"
		        @if (array_get($app->getOptions(), 'engine', 'apache') === $e)  selected="SELECTED" @endif
			>{{ ucwords($e) }}</option>
		@endforeach
	</select>
</label>