<?php

namespace App\Livewire\Course;

use App\Models\CertificateDetail;
use App\Models\Data\TestResult;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class Result extends Component
{
    public $resultId = '';

    public function mount($result_id) {
        $this->resultId = Crypt::decryptString($result_id);
    }

    public function render()
    {
        $testResult = TestResult::with(['quiz', 'user'])->find($this->resultId);
        $type = $testResult->type;
        $fixedType = str_replace('-', '_', $type);
        $certDetail = CertificateDetail::where('type', 'like', '%' . $fixedType . '%')->first();

        return view('livewire.course.result', [
            'testResult' => $testResult,
            'certDetail' => $certDetail
        ])->layout('certificate');;
    }
}
