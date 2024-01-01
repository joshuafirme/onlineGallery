
<div class="row mt-4">
                            
    @php
        $show_gm = $pr->final_approver_role_id == 5 ? true : false;
        $show_fd = $pr->final_approver_role_id == 4 ? true : false;
        $show_fm_dropdown = in_array(3, $roleIds) ? true : false;
    @endphp

    <div class="col-12">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <th>Requestor</th>
                    <th>HOD</th>
                    <th>Finance Manager</th>
                    @if ($show_fd) <th>Finance Director</th> @endif
                    @if ($show_gm) <th>General Manager</th> @endif
                </thead>
                <tbody>
                    <tr>
                        <td>
                            @if (($pr->hod_status == 'pending' && $pr->requested_by_id == $authUser->id) || !$series)
                                <select name="requestor_status" class="form-control" required>
                                    <option {{ $pr->requestor_status == 'pending' ? 'selected' : '' }} value="save_as_draft">Save as draft</option>
                                    <option {{ $pr->requestor_status == 'save_and_submit_for_approval' ? 'selected' : '' }} value="save_and_submit_for_approval">Save & Submit for Approval</option>
                                    <option {{ $pr->requestor_status == 'recall' ? 'selected' : '' }} value="recall">Recall</option>
                                </select>
                            @else
                                <span class="badge bg-primary">{{ Utils::decodeSlug($pr->requestor_status, '_', true) }}</span>
                            @endif
                        </td>
                        <td>
                            @if (($pr->finance_manager_status == 'pending' || $pr->finance_manager_status == 'reject_and_return') && $pr->hod_id == $authUser->id)
                                <select name="hod_status" class="form-control" required>
                                    <option {{ $pr->hod_status == 'pending' ? 'selected' : '' }} value="pending">Pending</option>
                                    <option {{ $pr->hod_status == 'approve' ? 'selected' : '' }} value="approve">Approve</option>
                                    <option {{ $pr->hod_status == 'return_to_requestor' ? 'selected' : '' }} value="return_to_requestor">Return to Requestor</option>
                                </select>
                            @else
                                <span class="badge bg-primary">{{ Utils::decodeSlug($pr->hod_status, '_', true) }}</span>
                            @endif
                        </td>
                        <td>
                            @if ($show_fm_dropdown && $pr->hod_status == 'approve')
                                <select name="finance_manager_status" class="form-control" required>
                                    <option {{ $pr->finance_manager_status == 'pending' ? 'selected' : '' }} value="pending">Pending</option>
                                    <option {{ $pr->finance_manager_status == 'submit_to_approvers' ? 'selected' : '' }} value="submit_to_approvers">Submit to Approvers</option>
                                    <option {{ $pr->finance_manager_status == 'reject_and_return' ? 'selected' : '' }} value="reject_and_return">Reject & Return</option>
                                </select>
                            @else
                                <span class="badge bg-primary">{{ Utils::decodeSlug($pr->finance_manager_status, '_', true) }}</span>
                            @endif
                        </td>
                        @if ($show_fd)
                        <td>
                            @if (in_array($pr->final_approver_role_id, $roleIds) && $pr->finance_manager_status == "submit_to_approvers")
                            <select name="finance_director_status" class="form-control" required>
                                <option {{ $pr->finance_director_status == 'pending' ? 'selected' : '' }} value="pending">Pending</option>
                                <option {{ $pr->finance_director_status == 'approve' ? 'selected' : '' }} value="approve">Approve</option>
                                <option {{ $pr->finance_director_status == 'reject_and_return' ? 'selected' : '' }} value="reject_and_return">Reject & Return</option>
                            </select>
                            @else
                                <span class="badge bg-primary">{{ Utils::decodeSlug($pr->finance_director_status, '_', true) }}</span>
                            @endif
                        </td>
                        @endif
                        @if ($show_gm)
                        <td>
                            @if (in_array($pr->final_approver_role_id, $roleIds) && $pr->finance_manager_status == "submit_to_approvers")
                            <select name="general_manager_status" class="form-control" required>
                                <option {{ $pr->general_manager_status == 'pending' ? 'selected' : '' }} value="pending">Pending</option>
                                <option {{ $pr->general_manager_status == 'approve' ? 'selected' : '' }} value="approve">Approve</option>
                                <option {{ $pr->general_manager_status == 'reject_and_return' ? 'selected' : '' }} value="reject_and_return">Reject & Return</option>
                            </select>
                            @else
                                <span class="badge bg-primary">{{ Utils::decodeSlug($pr->general_manager_status, '_', true) }}</span>
                            @endif
                        </td>
                        @endif
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            @if (in_array(2, $roleIds))
                                <textarea name="hod_remarks" class="form-control" rows="3" placeholder="Remarks...">{{ $pr->hod_remarks }}</textarea>
                            @endif
                        </td>
                        <td>
                            @if ($show_fm_dropdown)
                                <textarea name="fm_remarks" class="form-control" rows="3" placeholder="Remarks...">{{ $pr->fm_remarks }}</textarea>
                            @endif
                        </td>
                        @if ($show_fd)
                        <td>
                            @if (in_array($pr->final_approver_role_id, $roleIds))
                                <textarea name="fd_remarks" class="form-control" rows="3" placeholder="Remarks...">{{ $pr->fd_remarks }}</textarea>
                            @else
                            @endif
                        </td>
                        @endif
                        @if ($show_gm)
                        <td>
                            @if (in_array($pr->final_approver_role_id, $roleIds))
                                <textarea name="gm_remarks" class="form-control" rows="3" placeholder="Remarks...">{{ $pr->gm_remarks }}</textarea>
                            @else
                            @endif
                        </td>
                        @endif
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
