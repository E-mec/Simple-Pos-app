<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Section as SectionForm;

class Section extends Component
{
    // public $addMore=[0];
    public $addMore = [
        ['section_name' => '', 'status' => 0]
    ];

    public $sectionId;

    public $section_name;
    public $status = 0;

    public $checked = [];
    public $selectAll = false;


    public function isChecked($sectionId)
    {
        dd($sectionId);

        return $this->checked && $this->selectAll ?
                in_array($sectionId, $this->checked) :
                in_array($sectionId, $this->checked);
    }

    public function toggleSelectAll()
{
    $this->selectAll =!$this->selectAll;


    if ($this->selectAll) {
    $this->checked = SectionForm::pluck('id');
    }else{
    $this->checked = [];
    }

    // dd($this->checked);

}

public function updatedSelectAll($value)
{
    $this->checked = $value ? SectionForm::pluck('id')->toArray() : [];
}

public function updatedChecked($value, $index)
{
    $this->selectAll = count($this->checked) === SectionForm::count();
}


public function AddMore()
    {
        $this->addMore[] = ['section_name' => '', 'status' => 0];
    }

    // Remove More

    public function Remove($index)
    {
        if (count($this->addMore) > 1) {
            unset($this->addMore[$index]);
            $this->addMore = array_values($this->addMore); // Reindex array
        }
    }

    // Store Section

    public function store()
    {

        $this->validate([
            'addMore.*.section_name' => 'required|string|max:255',
            'addMore.*.status' => 'required'
        ]);

        foreach ($this->addMore as $section) {
            SectionForm::create([
                'section_name' => $section['section_name'],
                'status' => $section['status']
            ]);
        }

        // Reset form
        $this->addMore = [
            ['section_name' => '', 'status' => 0]
        ];

        // Close modal
        $this->dispatch('close-modal', ['id' => 'addSection']);

        $this->SwalMessageDialog('Section Created Successfully');
    }

    public function update()
    {


        $section = SectionForm::findOrFail($this->sectionId);
        $section->update([
            'section_name' => $this->section_name,
            'status' => $this->status,
        ]);

        // $section->save();

        $this->addMore = [
            ['section_name' => '', 'status' => 0]
        ];


        // Close modal
        $this->dispatch('close-modal', ['id' => 'addSection']);

        $this->SwalMessageDialog('Section Updated Successfully');
    }

    public function editSection($sectionId)
    {
        $section = SectionForm::findOrFail($sectionId);
        $this->section_name = $section->section_name;
        $this->status = $section->status; // Ensure this line sets the correct status
        $this->sectionId = $sectionId; // Set the sectionId
        // dd($section);
    }

    // Bulk Delete

    public function ConfirmBulkDelete()
    {
        $this->dispatch(
            'Swal:DeletedRecord',
            title: 'Are you sure you want to delete All ?',
            id: $this->checked
        );
    }

    // Delete Dialog show

    public function ConfirmDelete($sectionId)
    {
        $section = SectionForm::where('id', $sectionId)->first();

        $this->dispatch(
            'Swal:DeletedRecord',
            title: 'Are you sure you want to delete <span class="text-danger">' . $section->section_name . '</span>',
            id: $sectionId
        );
    }


    #[On('recordDeleted')]
    public function DeletedSection($sectionId)
    {
        $this->checked ? // Bulk Delete
        SectionForm::whereIn('id', $this->checked)->delete()

        :
        SectionForm::find($sectionId)->delete(); //Single Delete
        $this->dispatch('deleted');

        $this->checked = [];
        $this->selectAll = false;
    }




    public function SwalMessageDialog($message)
    {
        $this->dispatch('MSGSuccessful', title: $message);
    }

    public function render()
    {
        return view('livewire.section', [
            'sections' => SectionForm::all()
        ]);
    }
}
