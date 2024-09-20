<div class="modal fade closemodal" id="addSection" wire:ignore.self>
    <div class="modal-dialog  modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                    <h3 class="modal-title">Add New Section</h3>
                    <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">&times;</button>

            </div>

            <div class="modal-body">
                <form wire:submit.prevent="store" method="POST" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    {{-- @forelse ($addMore as $more) --}}
                        @foreach ($addMore as $index => $more )

                        <div class="row">
                            {{-- <div class="col">
                                <label for="">Section Name</label>
                                <input type="text" wire:model="section_name" class="form-control"
                                    autocomplete="off">
                                @error('section_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div> --}}

                            <div class="col">
                                <label for="section_name_{{ $index }}">Section Name</label>
                                <input type="text" wire:model.defer="addMore.{{ $index }}.section_name" class="form-control" autocomplete="off" id="section_name_{{ $index }}">
                                @error('addMore.' . $index . '.section_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="col-sm-1" data-bs-toggle="tooltip" title="status">
                                <label for="status_{{ $index }}" class="switch" style="margin-top: 22px !important;">
                                    <input type="checkbox" wire:model.defer="addMore.{{ $index }}.status" id="status_{{ $index }}">
                                    <span class="slider round"></span>
                                </label>
                            </div>


                            <div class="col-sm-2 d-flex align-items-center" style="margin-top: 22px !important;">
                                <button class="btn btn-success me-2" wire:click.prevent="AddMore">
                                    <i class="fa-solid fa-plus-circle"></i>
                                </button>
                                @if ($index > 0)
                                    <button class="btn btn-danger" wire:click.prevent="Remove({{ $index }})">
                                        <i class="fa-solid fa-minus-circle"></i>
                                    </button>
                                @endif
                            </div>




                        </div>

                    {{-- @empty
                    @endforelse --}}

                    @endforeach


                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary form-control">
                            Create Section
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


<style>
    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background-color: #ccc;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: #fff;
        transition: .4s;
    }

    input:checked + .slider {
        background-color: #2196f3;
    }

    input:checked + .slider:before {
        transform: translateX(26px);
    }

    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }
</style>

