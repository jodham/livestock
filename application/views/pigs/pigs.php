<div class="home-content">

      <div class="sales-boxes">
        <div class="recent-sales box">
            <div class="title row">
                <div class="col-md-12">
                    <span>Pigs</span>
                    <a class="btn btn-sm btn-primary mx-3" href="<?= base_url()."pig/breeds"?>">Breeds</a>
                    <a class="btn btn-sm btn-primary float-right" href="<?= base_url()."pig/add_pig"?>">Add Pig</a>
                </div>
        </div>
          <div class="sales-details"> 
            <?php if(isset($pigs) && !empty($pigs)): ?>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                       
                        <th>Tag</th>
                        <th>Breed</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $n=1; foreach($pigs as $pig):?>
                    <tr>
                        <td><?= $n++?></td>
                        <td><?= $pig->tag?></td>
                        <td><?= $pig->breed?></td>
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
                    <div class="col-md-12 text-warning text-center">No pigs found.</div>
                </div>
            <?php endif;?>
          </div>
          <div class="button">
            <a href="#">See More</a>
          </div>
        </div>
           
      </div>
    </div>