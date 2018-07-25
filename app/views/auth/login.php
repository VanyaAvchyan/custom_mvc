<div class="modal-body">
    <form action="/auth/login" method="post" class = 'form-horizontal form-label-left'>

        <div class="form-group">
            <label class="control-label col-sm-3" for="username">User name</label>
            <div class="col-sm-5">
                <input type="text" name="username" class="form-control col-sm-10" id="username" placeholder="User name">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-3" for="password">Password</label>
            <div class="col-sm-5">
                <input type="text" name="password" class="form-control col-sm-10" id="password" placeholder="Password">
            </div>
        </div>

        <div class="form-group col-sm-5 pull-right">
            <button type="submit" class="btn btn-primary">Login</button>
        </div>
    </form>
</div>