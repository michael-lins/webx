        <form action="/" method="post">
            <fieldset>
                <legend>New name form</legend>
            <div class="form-group">
                <label for="txtName">Name</label>
                <input type="text" class="form-control" id="txtName" aria-describedby="nameHelp" placeholder="Enter name" name="name">
                <small id="namelHelp" class="form-text text-muted">Please, enter the name to be inserted in the list.</small>
            </div>
            
            <input type="hidden" name="<?= Router::ACTION_FORM_VAR_NAME ?>" value="Insert"/>
            <button type="submit" class="btn btn-primary">Insert</button>
            </fieldset>
        </form>
    
        <form action="/" method="post">
            <button type="submit" class="btn btn-secondary">Cancel</button>
            <input type="hidden" name="<?= Router::ACTION_FORM_VAR_NAME ?>" value=""/>
        </form>