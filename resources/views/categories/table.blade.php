<div class="col-md-4 col-sm-4">

    @if (count($checked) > 1)
        <a href="#" class="btn btn-outline btn-sm" wire:click.prevent="ConfirmBulkDelete">

            ( {{ count($checked) }} Rows Selected to <b>DELETE</b>)

        </a>
    @endif



</div>

<table class="table" width="100%">

    <thead>
        <tr>
            <th>
                <input type="checkbox" wire:model="selectAll" wire:click.prevent="toggleSelectAll">
            </th>
            <th>
                Section Name
            </th>
            <th>
                Status
            </th>
            <th>
                Action
            </th>
        </tr>
    </thead>

    <tbody>
        {{-- {{ count($checked) }} --}}
        @forelse ($sections as $section)
            <tr>
                <td><input class="" value="{{ $section->id }}" wire:model="checked" type="checkbox"></td>
                <td>{{ $section->section_name }}</td>
                <td>{{ $section->status == 1 ? 'Active' : 'Disabled' }}</td>
                <td>
                    <div class="btn-group">
                        <a href="" data-bs-toggle="modal" data-bs-target="#editSection"
                            wire:click.prevent="editSection({{ $section->id }})" class="btn btn-info">
                            <i class="fa-solid fa-edit"></i> Edit
                        </a>

                        @if (count($checked) < 2)

                        <a href="" wire:click.prevent="ConfirmDelete({{ $section->id }})"
                            class="btn btn-danger">
                            <i class="fa-solid fa-trash"></i> Delete
                        </a>

                        @endif
                    </div>
                </td>
            </tr>
            @include('sections.edit')

        @empty
        @endforelse

    </tbody>

</table>
