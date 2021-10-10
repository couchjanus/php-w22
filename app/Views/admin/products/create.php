<div class="row">
    <div class="col-10">
        <form action="/admin/products/store" method="POST" class="neads-validations" enctype="multipart/form-data">
        <div class="row">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name='name'>
        </div>
        <div class="row">
        <input type="checkbox" class="form-check-input" name='status'>
            <lable class="form-check-0label">Status</lable>
            
        </div>
        <div class="row">
            <lable class="form-label">Price</lable>
            <input type="text" class="form-control" name='price'>  
        </div>

        <div class="row">
            <lable class="form-label">Brand</lable>
            <select class="form-select" name="brand_id">
                <option value="">Choose...</option>
                <?php foreach($brands as $brand):?>
                    <option value="<?=$brand->id?>">
                        <?=$brand->name?>
                    </option>
                <?php endforeach; ?>

            </select>
            
        </div>

        <div class="row">
            <lable class="form-label">Category</lable>
            <select class="form-select" name="category_id">
                <option value="">Choose...</option>
                <?php foreach($categories as $category):?>
                    <option value="<?=$category->id?>">
                        <?=$category->name?>
                    </option>
                <?php endforeach; ?>

            </select>
            
        </div>

        <div class="row">
            <lable class="form-label">Choose a file</lable>
            <input type="file" class="form-control" name='image'>  
        </div>

        <div class="row">
            <lable class="form-label">Description</lable>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <hr>
        <button class="w-100 btn btn-primary btn-sm" type="submit">Add Neew</button>
    </form>
    </div>
</div>