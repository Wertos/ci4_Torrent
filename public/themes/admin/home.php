<?php defined('APPPATH') OR exit('No direct script access allowed'); ?>
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
              <div class="fs-4 text-secondary fw-bolder"><?= lang('Admin.DashBoard'); ?></div>
              <div class="text-secondary lead fw-normal" id="curr_date_time"></div>
            </div>
            <hr>
            <div class="row g-4 mb-4">
              <div class="col-lg-3 col-md-6">
                <a href="#" class="text-decoration-none">
                  <div class="card bg-primary bg-gradient shadow-sm custom-card">
                    <div class="card-body p-3 pb-2 px-3 d-flex flex-row justify-content-between align-items-center">
                      <div>
                        <h1><i class="fas fa-angles-down fa-2x text-white-50"></i></h1>
                      </div>
                      <div class="text-center">
                        <h4 class="display-4 fw-bold text-white"><?= $countTorrents; ?></h4>
                        <h6 class="text-white-50"><?= lang('Admin.TorrentsAll'); ?></h6>
                      </div>
                    </div>
                  </div>
                </a>
              </div>

              <div class="col-lg-3 col-md-6">
                <a href="#" class="text-decoration-none">
                  <div class="card bg-dark bg-success shadow-sm custom-card">
                    <div class="card-body p-3 pb-2 px-3 d-flex flex-row justify-content-between align-items-center">
                      <div>
                        <h1><i class="fas fa-angle-down fa-2x text-white-50"></i></h1>
                      </div>
                      <div class="text-center">
                        <h5 class="display-4 fw-bold text-white"><?= $newTorrents; ?></h5>
                        <h6 class="text-white-50"><?= lang('Admin.TorrentsOnDay'); ?></h6>
                      </div>
                    </div>
                  </div>
                </a>
              </div>

              <div class="col-lg-3 col-md-6">
                <a href="<?= base_url('admin/users'); ?>" class="text-decoration-none">
                  <div class="card bg-primary bg-gradient shadow-sm custom-card">
                    <div class="card-body p-3 pb-2 px-3 d-flex flex-row justify-content-between align-items-center">
                      <div>
                        <h1><i class="fa-regular fa-user-plus fa-2x text-white-50"></i></h1>
                      </div>
                      <div class="text-center">
                        <h5 class="display-4 fw-bold text-white"><?= $newUsers; ?></h5>
                        <h6 class="text-white-50"><?= lang('Admin.UsersOnDay'); ?></h6>
                      </div>
                    </div>
                  </div>
                </a>
              </div>

              <div class="col-lg-3 col-md-6">
                <a href="<?= base_url('admin/users'); ?>" class="text-decoration-none">
                  <div class="card bg-dark bg-gradient shadow-sm custom-card">
                    <div class="card-body p-3 pb-2 px-3 d-flex flex-row justify-content-between align-items-center">
                      <div>
                        <h1><i class="fas fa-people-line fa-2x text-white-50"></i></h1>
                      </div>
                      <div class="text-center">
                        <h5 class="display-4 fw-bold text-white"><?= $countUsers; ?></h5>
                        <h6 class="text-white-50"><?= lang('Admin.UsersOnline'); ?></h6>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
            </div>
            <div class="row g-4">
              <div class="col-lg-3 col-md-6">
                <a href="<?= base_url('admin/comments'); ?>" class="text-decoration-none">
                  <div class="card bg-primary bg-gradient shadow-sm custom-card">
                    <div class="card-body p-3 pb-2 px-3 d-flex flex-row justify-content-between align-items-center">
                      <div>
                        <h1><i class="fas fa-comments fa-2x text-white-50"></i></h1>
                      </div>
                      <div class="text-center">
                        <h4 class="display-4 fw-bold text-white"><?= $countComments; ?></h4>
                        <h6 class="text-white-50"><?= lang('Admin.CommentsAll'); ?></h6>
                      </div>
                    </div>
                  </div>
                </a>
              </div>

              <div class="col-lg-3 col-md-6">
                <a href="<?= base_url('admin/comments'); ?>" class="text-decoration-none">
                  <div class="card bg-dark bg-success shadow-sm custom-card">
                    <div class="card-body p-3 pb-2 px-3 d-flex flex-row justify-content-between align-items-center">
                      <div>
                        <h1><i class="fas fa-comment fa-2x text-white-50"></i></h1>
                      </div>
                      <div class="text-center">
                        <h5 class="display-4 fw-bold text-white"><?= $newComments; ?></h5>
                        <h6 class="text-white-50"><?= lang('Admin.CommentsOnDay'); ?></h6>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
              <div class="col-lg-3 col-md-6">
                <a href="<?= base_url('admin/reports'); ?>" class="text-decoration-none">
                  <div class="card bg-danger bg-gradient shadow-sm custom-card">
                    <div class="card-body p-3 pb-2 px-3 d-flex flex-row justify-content-between align-items-center">
                      <div>
                        <h1><i class="fas fa-sensor-triangle-exclamation fa-2x text-white-50"></i></h1>
                      </div>
                      <div class="text-center">
                        <h4 class="display-4 fw-bold text-white"><?= $countReports; ?></h4>
                        <h6 class="text-white-50"><?= lang('Admin.ReportsAll'); ?></h6>
                      </div>
                    </div>
                  </div>
                </a>
              </div>

              <div class="col-lg-3 col-md-6">
                <a href="<?= base_url('admin/reports'); ?>" class="text-decoration-none">
                  <div class="card bg-dark bg-success shadow-sm custom-card">
                    <div class="card-body p-3 pb-2 px-3 d-flex flex-row justify-content-between align-items-center">
                      <div>
                        <h1><i class="fas fa-triangle-exclamation fa-2x text-white-50"></i></h1>
                      </div>
                      <div class="text-center">
                        <h5 class="display-4 fw-bold text-white"><?= $newReports; ?></h5>
                        <h6 class="text-white-50"><?= lang('Admin.ReportsOnDay'); ?></h6>
                      </div>
                    </div>
                  </div>
                </a>
              </div>


              <div class="col-lg-12">
              </div>
            </div>
