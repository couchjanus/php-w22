<div class="table-responsive">
  <?php if (count($brands)>0):?>
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
            <?php foreach($brands as $brand):?>
                <tr>
                    <td><?=$brand->id?></td>
                    <td><?=$brand->name?></td>
                    <td><?=$brand->status?></td>
                    <td><button>action</button></td>
                </tr>
                <?php endforeach;?>
        </tbody>
    </table>
    <?php endif;?>
</div>
