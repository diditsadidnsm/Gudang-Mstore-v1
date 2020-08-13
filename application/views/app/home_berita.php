              <div class="box box-info">
              <?php 
                $attributes = array('role'=>'form');
                echo form_open_multipart('app/cepat_berita',$attributes); 
              ?>
                <div class="box-header">
                  <i class="fa fa-pencil"></i>
                  <h3 class="box-title">Tulis Catatan</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>

                <div class="box-body">
                    <div class="form-group">
                      <input type="text" class="form-control" name="a" placeholder="Judul Berita...">
                    </div>
                    <div class="form-group">
                      <textarea name='b' placeholder="Isi Berita..." style="width: 100%; height: 220px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                    </div>
                </div>

                <div class="box-footer clearfix">
                  <button type='submit' name='submit' class="pull-right btn btn-default" id="sendEmail">Submit <i class="fa fa-arrow-circle-right"></i></button>
                </div>
              </div>
