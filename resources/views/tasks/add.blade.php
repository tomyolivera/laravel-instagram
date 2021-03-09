<div class="flex justify-center">
    <form method="POST" action="" class="text-gray-300 mb-4">
        <div class="row">
            <div class="col-md-4 form-group">
                <label for="category">{{ _('Category') }}</label>
                <select name="category" id="category" class="input">
                    <option value="">Historia Judia</option>
                    <option value="">Programacion</option>
                    <option value="">Fuentes</option>
                </select>
            </div>

            <div class="col-md-4 form-group">
                <label for="name">{{ __('Name') }}</label>
                <input type="text" name="name" id="name" class="input">
            </div>

            <div class="col-md-4 form-group">
                <label for="description">{{ __('Description') }}</label>
                <input type="text" name="description" id="description" class="input">
            </div>

        </div>

        <div class="form-group">
            <button class="btn btn-outline-primary btn-block">{{ __('Add') }}</button>
        </div>
    </form>
</div>

<hr class="my-3 bg-gray-300">