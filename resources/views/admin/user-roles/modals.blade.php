<div class="modal fade" id="roleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <form action="#" method="post" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title">Create Role</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body row g-3 ">
                <div class="col-md-12">
                    <label for="validationCustom01" class="form-label">Role name</label>
                    <input type="text" class="form-control" name="name" required>
                </div>

                <div class="col-md-12 mt-4">
                    <b>Permissions</b>
                </div>

                <div class="col-md-12">
                    <div class="row my-2">
                        <div class="col-8 pt-1">
                            <div class="custom-control pl-0">
                                <label for="customCheck-all">All Permission</label>
                            </div>
                        </div>
                        <div class="col-4 pt-1">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" id="customCheck-all" value="all">
                            </div>
                        </div>
                    </div>
                    <hr>
                     
                    <div class="ic_parent_permission">
                        <div class="row my-2">
                            <div class="col-8 pt-1">
                                <div class="custom-control">
                                    <label for="customCheck-1">
                                        <strong>Dashboard</strong></label>
                                </div>
                            </div>
                            <div class="col-4 pt-1">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="permissions[]" value="dashboard"
                                        class="ic-parent-permission" id="chkbx-dashboard" ref="1">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="ic_parent_permission">
                        <div class="row my-2">
                            <div class="col-8 pt-1">
                                <div class="custom-control">
                                    <label for="customCheck-1">
                                        <strong>Account Payments</strong></label>
                                </div>
                            </div>
                            <div class="col-4 pt-1">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="permissions[]" value="account_payments"
                                        class="ic-parent-permission" id="chkbx-account_payments" ref="1">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="ic_parent_permission">
                        <div class="row my-2">
                            <div class="col-8 pt-1">
                                <div class="custom-control">
                                    <label for="customCheck-1">
                                        <strong>Messages</strong></label>
                                </div>
                            </div>
                            <div class="col-4 pt-1">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="permissions[]" value="messages"
                                        class="ic-parent-permission" id="chkbx-messages" ref="1">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    
                    <div class="ic_parent_permission">
                        <div class="row my-2">
                            <div class="col-8 pt-1">
                                <div class="custom-control">
                                    <label><strong>Administration
                                        </strong></label>
                                </div>
                            </div>
                            <div class="col-4 pt-1">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="ic-parent-permission" value="administration"
                                        id="chkbx-all-administration">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="row">
                            <div class="col-8 pt-1">
                                <div class="custom-control">
                                    <label>Users</label>
                                </div>
                            </div>
                            <div class="col-4 pt-1">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="permissions[]" id="chkbx-users" value="users"
                                        class="parent-identy-administration">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="row">
                            <div class="col-8 pt-1">
                                <div class="custom-control">
                                    <label>Roles</label>
                                </div>
                            </div>
                            <div class="col-4 pt-1">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="permissions[]" id="chkbx-roles" value="roles"
                                        class="parent-identy-administration">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>

                    <div class="ic_parent_permission">
                        <div class="row my-2">
                            <div class="col-8 pt-1">
                                <div class="custom-control">
                                    <h4>Maintenance</h4>
                                </div>
                            </div>
                            <div class="col-4 pt-1">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="ic-parent-permission" value="maintenance"
                                        id="chkbx-all-maintenance">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-2"><strong>Website contents</strong></div>
                    <div>
                        <div class="row">
                            <div class="col-8 pt-1">
                                <div class="custom-control">
                                    <label>Why Choose Us</label>
                                </div>
                            </div>
                            <div class="col-4 pt-1">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="permissions[]" id="chkbx-why_choose_us"
                                        value="why_choose_us" class="parent-identy-maintenance">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="row">
                            <div class="col-8 pt-1">
                                <div class="custom-control">
                                    <label>Free Trial Guide</label>
                                </div>
                            </div>
                            <div class="col-4 pt-1">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="permissions[]" id="chkbx-free_trial_guide"
                                        value="free_trial_guide" class="parent-identy-maintenance">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-2"><strong>Home page contents</strong></div>
                    <div>
                        <div class="row">
                            <div class="col-8 pt-1">
                                <div class="custom-control">
                                    <label>Sliders</label>
                                </div>
                            </div>
                            <div class="col-4 pt-1">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="permissions[]" id="chkbx-sliders"
                                        value="sliders" class="parent-identy-maintenance">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="row">
                            <div class="col-8 pt-1">
                                <div class="custom-control">
                                    <label>Cards</label>
                                </div>
                            </div>
                            <div class="col-4 pt-1">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="permissions[]" id="chkbx-cards"
                                        value="cards" class="parent-identy-maintenance">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="row">
                            <div class="col-8 pt-1">
                                <div class="custom-control">
                                    <label>Testimonials</label>
                                </div>
                            </div>
                            <div class="col-4 pt-1">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="permissions[]" id="chkbx-testimonials"
                                        value="testimonials" class="parent-identy-maintenance">
                                </div>
                            </div>
                        </div>
                    </div>
                 
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-sm btn-primary" type="submit">Save</button>
            </div>
        </form>
    </div>
</div>
