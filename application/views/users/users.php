<div class="home-content">

      <div class="sales-boxes">
        <div class="recent-sales box">
            <div class="title row">
                <div class="col-md-12">
                    <span>Users</span>
                    <a class="btn btn-sm btn-primary float-right" href="<?= base_url()."user/create_user"?>">Add User</a>
                </div>
        </div>
          <div class="sales-details"> 
            <?php if(isset($users) && !empty($users)): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $n=1; foreach($users as $user):?>
                    <tr>
                        <td><?= $n++?></td>
                        <td><?= getUserNames($user->id)?></td>
                        <td><?= $user->phone?></td>
                        <td><?= $user->email?></td>
                        <td>
                            <a href="#"><i class="fa fa-edit"></i></a>
                            <a href="#"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php endforeach;?>
                    <!-- Add more rows as needed -->
                </tbody>
            </table>
            <?php else:?>
                <div class="row">
                    <div class="col-md-12 text-warning text-center">No users found.</div>
                </div>
            <?php endif;?>
          </div>
          <div class="button">
            <a href="#">See More</a>
          </div>
        </div>
           
      </div>
    </div>