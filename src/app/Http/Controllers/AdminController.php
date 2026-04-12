<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $query = $this->getSearchQuery($request);

        $contacts = $query->paginate(7)->appends($request->all());
        $categories = Category::all();

        return view('admin.index', compact('contacts', 'categories'));
    }

    public function search(Request $request)
    {
        $query = $this->getSearchQuery($request);

        $contacts = $query->paginate(7)->appends($request->all());
        $categories = Category::all();

        return view('admin.index', compact('contacts', 'categories'));
    }

    public function reset()
    {
        return redirect()->route('admin.index');
    }

    public function destroy($id)
    {
        Contact::findOrFail($id)->delete();

        return redirect()->route('admin.index');
    }

    public function export(Request $request): StreamedResponse
    {
        $query = $this->getSearchQuery($request);
        $contacts = $query->get();

        $fileName = 'contacts_' . now()->format('Ymd_His') . '.csv';

        $headers = [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => "attachment; filename={$fileName}",
        ];

        return response()->streamDownload(function () use ($contacts) {
            $handle = fopen('php://output', 'w');

            fwrite($handle, "\xEF\xBB\xBF");

            fputcsv($handle, [
                'お名前',
                '性別',
                'メールアドレス',
                '電話番号',
                '住所',
                '建物名',
                'お問い合わせの種類',
                'お問い合わせ内容',
                '作成日',
            ]);

            foreach ($contacts as $contact) {
                fputcsv($handle, [
                    $contact->last_name . ' ' . $contact->first_name,
                    $this->getGenderLabel($contact->gender),
                    $contact->email,
                    $contact->tel,
                    $contact->address,
                    $contact->building,
                    optional($contact->category)->content,
                    $contact->detail,
                    optional($contact->created_at)->format('Y-m-d'),
                ]);
            }

            fclose($handle);
        }, $fileName, $headers);
    }

    private function getSearchQuery(Request $request)
    {
        $query = Contact::query()->with('category');

        if ($request->filled('keyword')) {
            $keyword = $request->keyword;

            $query->where(function ($q) use ($keyword) {
                $q->where('first_name', 'like', "%{$keyword}%")
                    ->orWhere('last_name', 'like', "%{$keyword}%")
                    ->orWhereRaw("CONCAT(last_name, first_name) LIKE ?", ["%{$keyword}%"])
                    ->orWhereRaw("CONCAT(last_name, ' ', first_name) LIKE ?", ["%{$keyword}%"])
                    ->orWhere('email', 'like', "%{$keyword}%");
            });
        }

        if ($request->filled('gender') && $request->gender !== '0') {
            $query->where('gender', $request->gender);
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->filled('created_at')) {
            $query->whereDate('created_at', $request->created_at);
        }

        return $query;
    }

    private function getGenderLabel($gender): string
    {
        return match ((int) $gender) {
            1 => '男性',
            2 => '女性',
            default => 'その他',
        };
    }
}