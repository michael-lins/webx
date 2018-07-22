        <form action="/" method="post">
            <fieldset>
                <legend>Edit name form</legend>
            <div class="form-group">
                <label for="txtName">Name</label>
                <input type="text" class="form-control" id="txtName" aria-describedby="nameHelp" placeholder="Enter name" name="name" value="<?= $this->app->getCurrentAction()->searchByCurrentPk(); ?>">
                <small id="namelHelp" class="form-text text-muted">Please, edit the name and save by pressing the button bellow.</small>
            </div>
            
            <input type="hidden" name="<?= Router::PK_FORM_VAR_NAME ?>" value="<?= $this->app->getCurrentAction()->getPk() ?>"/>
            <input type="hidden" name="<?= Router::ACTION_FORM_VAR_NAME ?>" value="Save"/>
            <button type="submit" class="btn btn-primary">Save</button>
            </fieldset>
        </form>
    
        <form action="/" method="post">
            <button type="submit" class="btn btn-secondary">Cancel</button>
            <input type="hidden" name="<?= Router::ACTION_FORM_VAR_NAME ?>" value=""/>
        </form>