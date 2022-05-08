<template>
    <div class="card card-primary card-outline">
        <div class="card-body">
            <h5 class="card-title">Create Category</h5>
            <br />
            <form role="form" action="" method="post">
                <div class="card-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input
                            type="text" class="form-control" placeholder="Enter category name" name="name"/>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-sm btn-primary">
                        <i class="fa fa-save"></i> Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>
<script>
import store from '../../store';
import * as actions from '../../store/action-types';
export default {

mounted(){
    // Get Categories
    store.dispatch(actions.GET_CATEGORIES);
}

};
</script>
