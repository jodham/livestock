<div class="home-content">

      <div class="sales-boxes">
        <div class="recent-sales box">
            <div class="title row">
                <div class="col-md-12">
                    <span>Breeds</span>
                    <a class="btn btn-sm btn-primary float-right" href="<?= base_url()."pig/add_breed"?>">Add Breed</a>
                </div>
        </div>
          <div class="sales-details"> 
            <?php if(isset($breeds) && !empty($breeds)): ?>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Breed</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $n=1; foreach($breeds as $breed):?>
                    <tr>
                        <td><?= $n++?></td>
                        <td><?= $breed->name?></td>
                        <td><?= $breed->description?></td>
                        
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
                    <div class="col-md-12 text-warning text-center">No breed found.</div>
                </div>
            <?php endif;?>
          </div>
          <div class="button">
            <a href="#">See More</a>
          </div>
        </div>
           
      </div>
    </div>