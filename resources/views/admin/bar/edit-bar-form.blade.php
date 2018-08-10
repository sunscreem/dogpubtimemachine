<div class="row mb-3">
    <div class="col-4">
        <label for="barname">Bar Name:</label> 
        <input  type="text" 
                name="name" 
                class="form-control {{ $errors->has('name') ? 'is-invalid' : ''  }}"
                id="barname" 
                value="{{ old('name',($bar->name) ?? null) }}">
        <div class="invalid-feedback">Please provide a name for this bar</div>
    </div>
    <div class="col-3">
        <label for="territory">Territory: <small>(UK/USA/International)</small></label> 
        <select name="territory" 
                id="territory"
                class="form-control {{ $errors->has('territory') ? 'is-invalid' : ''  }}"
                >
            <option value="UK" @if(old('territory',($bar->territory) ?? null) == 'UK') selected @endif >UK</option>
            <option value="USA" @if(old('territory',($bar->territory) ?? null) == 'USA') selected @endif>USA</option>
            <option value="International" @if(old('territory',($bar->territory) ?? null) == 'International') selected @endif>International</option>
        </select>
        <div class="invalid-feedback">Please provide a valid territory</div>
    </div>
</div>
<div class="row mb-3">
    <div class="col-5">
        <label for="bar_url">Bar Homepage URL:</label> 
        <input  type="text" 
                name="bar_url" 
                class="form-control {{ $errors->has('bar_url') ? 'is-invalid' : ''  }}"
                id="bar_url" 
                value="{{ old('bar_url',($bar->bar_url) ?? null) }}">
        <div class="invalid-feedback">Please provide a valid bar homepage url</div>
    </div>
</div>
<div class="row mb-3">
    <div class="col-5">
        <label for="tap_list_url">Tap List URL:</label> 
        <input  type="text" 
                name="tap_list_url" 
                class="form-control {{ $errors->has('tap_list_url') ? 'is-invalid' : ''  }}" 
                id="tap_list_url" 
                value="{{ old('tap_list_url',($bar->tap_list_url) ?? null) }}"
                >
        <div class="invalid-feedback">Please provide a valid tap list url</div>
    </div>
</div>