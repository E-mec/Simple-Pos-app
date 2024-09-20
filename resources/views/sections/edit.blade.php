<div class="modal fade closemodal" id="editSection" wire:ignore.self>
    <div class="modal-dialog  modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Edit Section</h3>
                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">&times;</button>

            </div>

            <div class="modal-body">
                <form wire:submit.prevent="update" method="POST" enctype="multipart/form-data" autocomplete="off">
                    @csrf

                    <div class="row">

                        <div class="col">
                            <label for="section_name">Section Name</label>
                            <input type="text" wire:model="section_name" class="form-control"
                                autocomplete="off" id="section_name">
                            @error('section_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-sm-1" data-bs-toggle="tooltip" title="status">
                            <label for="status" class="switch" style="margin-top: 22px !important;">
                                <input type="checkbox" wire:model="status" id="status" >
                                <span class="slider round"></span>
                            </label>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary form-control">
                            Update Section
                        </button>
                        <button type="button" class="btn btn-danger form-control" data-bs-dismiss="modal">
                            Close
                        </button>
                    </div>



                </form>
            </div>

        </div>
    </div>
</div>



