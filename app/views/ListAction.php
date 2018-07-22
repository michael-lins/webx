            <div>
                <form action="/" method="post">
                    <button type="submit" class="btn btn-success btn-lg float-right">Create new name</button>
                    <input type="hidden" name="<?= Router::ACTION_FORM_VAR_NAME ?>" value="New"/>
                </form>
            </div>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col" colspan="2">Actions</th>
                    </thead>
                    <tbody>
                    <?php foreach ( $this->app->getCurrentAction()->getList() as $id => $name ) { ?>
                        <tr>
                            <th scope="row"><?= $id ?></td>
                            <td><?= $name ?></td>
                            <td>
                                <form action="/" method="post">
                                    <button type="submit" class="btn btn-link btn-sm float-left">Edit</button>
                                    <input type="hidden" name="<?= Router::ACTION_FORM_VAR_NAME ?>" value="Edit"/>
                                    <input type="hidden" name="<?= Router::PK_FORM_VAR_NAME ?>" value="<?= $id ?>"/>
                                </form>
                                <form action="/" method="post">
                                    <button type="submit" class="btn btn-link btn-sm" style="color: red;">Delete</button>
                                    <input type="hidden" name="<?= Router::ACTION_FORM_VAR_NAME ?>" value="Delete"/>
                                    <input type="hidden" name="<?= Router::PK_FORM_VAR_NAME ?>" value="<?= $id ?>"/>
                                </form>
                            </td>
                        </tr>
                    <?php } //end foreach ?>
                    </tbody>
                </table>
            </div>