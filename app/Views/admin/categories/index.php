<div class="table-responsive">
  <?php if (count($categories)>0):?>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($categories as $category):?>
                <tr>
                    <td><?=$category->id?></td>
                    <td><?=$category->name?></td>
                    <td><?=$category->status?></td>
                    <td><button>action</button></td>
                </tr>
                <?php endforeach;?>
        </tbody>
    </table>
    <?php endif;?>
</div>
