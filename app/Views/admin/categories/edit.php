<div class="row">
    <div class="col-10">
        <form action="/admin/categories/update" method="POST" class="neads-validations">
        <input type="hidden" name='id' value="<?=$category->id?>">
        <div class="row">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" value="<?=$category->name?>" name='name'>
        </div>
        <div class="row">
        <input type="checkbox" class="form-check-input" name='status' <?php echo ($category->status==1)?'checked':''?>>
            <lable class="form-check-0label">Status</lable>
            
        </div>
        <hr>
        <button class="w-100 btn btn-primary btn-sm" type="submit">Add Neew</button>
    </form>
    </div>
</div>