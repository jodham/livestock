<div class="home-content">

      <div class="sales-boxes">
        <div class="recent-sales box">
            <div class="title row">
                <div class="col-md-12">
                    <span>Fate</span>
                    <a class="btn btn-sm btn-primary float-right" href="<?= base_url()."pig/add_fate"?>">Add fate</a>
                </div>
        </div>
          <div class="sales-details"> 
            <?php if(isset($fates) && !empty($fates)): ?>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Fate</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $n=1; foreach($fates as $fate):?>
                    <tr>
                        <td><?= $n++?></td>
                        <td><?= $fate->fate?></td>
                        <td><?= $fate->description?></td>
                        
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
                    <div class="col-md-12 text-warning text-center">No fate found.</div>
                </div>
            <?php endif;?>
          </div>
          <div class="button">
            <a href="#">See More</a>
          </div>
        </div>
           
      </div>
    </div>