<div class="home-content">
      <div class="sales-boxes">
        <div class="recent-sales box">
            
          <div class="title">Add Pig</div>
            <div class="sales-details">
                    <form class="inputform row" enctype="multipart/form-data" action="<?= base_url()."pig/add_pig"?>" method="post">
                        <div class="form-group col-md-4">
                            <label for="tag" class="control-label">Tag:</label>
                            <input type="text" id="tag" value="<?= $tag?>" name="tag" class="form-control form-control-sm">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="breed" class="control-label">Breed:</label>
                            <select class="form-control from-contro-sm" required name="breed" id="breed">
                              <option value="#">select breed</option>
                              <?php foreach($breeds as $breed):?>
                                <option <?= ($breedId == $breed->id) ? 'selected' : '';?> value="<?= $breed->id?>"><?= $breed->name?></option>
                              <?php endforeach?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="ftag" class="control-label">Father Tag:</label>
                            <select class="form-control from-contro-sm" required name="ftag" id="ftag">
                              <option value="">select tag</option>
                              <option value="Null">No father</option>
                              <?php foreach($malePigs as $pig):?>
                              <option <?= ($ftag == $pig->father_tag) ? 'selected' : '';?> value="<?= $pig->father_tag?>"><?= $pig->father_tag?></option>
                              <?php endforeach;?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="mtag" class="control-label">Mother Tag:</label>
                            <select class="form-control from-contro-sm" required name="mtag" id="ftag">
                              <option value="">select tag</option>
                              <option value="Null">No mother</option>
                              <?php foreach($femalePigs as $pig):?>
                              <option <?= ($mtag == $pig->mother_tag) ? 'selected' : '';?> value="<?= $pig->mother_tag?>"><?= $pig->mother_tag?></option>
                              <?php endforeach;?>
                            </select>
                        </div>
                       
                        <div class="form-group col-md-4">
                            <label for="date" class="control-label">Dob:</label>
                            <input autocomplete="off" type="text" required readonly value="<?= $dob?>" id="date" name="dob" class="form-control form-control-sm datepicker">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="pen" class="control-label">Pen Number:</label>
                            <select class="form-control from-contro-sm" required name="pen" id="pen">
                              <option value="">select pen number</option>
                             <?php foreach($pens as $pen):?>
                              <option <?= ($penNo == $pen->id) ? 'selected' : '';?> value="<?= $pen->id?>"><?= $pen->pen_No?></option>
                              <?php endforeach;?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="fate" class="control-label">Fate:</label>
                            <select class="form-control from-contro-sm" required name="fate" id="fate">
                              <option value="">select fate</option>
                              <?php foreach($fates as $fate):?>
                                <option  <?= ($fateId == $fate->id) ? 'selected' : '';?> value="<?= $fate->id?>"><?= $fate->fate?></option>
                              <?php endforeach;?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="gender" class="control-label">Gender</label><br>
                            <input type="radio" <?= ($gender == "Male") ? 'checked' : '';?>  value="Male" id="gender" name="gender"> Male
                            <input type="radio" <?= ($gender == "Female") ? 'checked' : '';?> class="ml-3" value="Female" id="gender" name="gender"> Female
                        </div>
                        <div class="form-group-long">
                            <button type="submit" class="mybuttongreen">Submit</button>
                            <button type="submit" class="mybutton">Reset</button>
                            <button type="submit" class="mybutton">Update</button>
                            <button type="submit" class="mybuttonred">Delete</button>
                        </div>
                    </form>
            </div>
        </div>
       
      </div>
   
     
    </div>