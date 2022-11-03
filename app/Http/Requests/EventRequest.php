<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'  => 'required|max:50', 
            'discription'  => 'required|max:200', 
            'image_uploader'  => 'required|max:10000|mimes:jpeg,jpg,png,gif', 
            'event_start'  => 'required|date|after:yesterday',
            'event_end'  => 'required|date|after:event_start', 
            'event_time_discription'  => 'nullable|max:255',
            'fee'  => 'nullable|numeric',
            'official_url'  => 'nullable|url',
            'venue'  => 'required|max:20',
            'zip'  => 'required|zip',
            'address1'  => 'required|not_in: 0',
            'address2'  => 'required|max:20',
            'category_id'  => 'required|exists:categories,id',
        ];
    }

    public function messages()
    {
        return [
            // イベント名
            'title.required' => 'イベント名を入力してください',
            'title.max' => 'イベント名は50文字以下で入力してください',
            // イベント概要
            'discription.required' => 'イベント概要を入力してください',
            'discription.max' => 'イベント概要は255文字以下で入力してください',
            // 画像
            'image_uploader.required' => '画像をアップロードしてください',
            'image_uploader.max' => '10MBを超えるファイルはアップロードできません',
            'image_uploader.mimes' => '指定のファイル形式以外はアップロードできません',
            // イベント開始日
            'event_start.required' => '開始日を入力してください',
            'event_start.date' => '有効な日付を指定してください',
            'event_start.after' => '今日より後の日付を指定してください',
            // イベント終了日
            'event_end.required' => '終了日を入力してください',
            'event_end.date' => '有効な日付を指定してください',
            'event_end.after' => ':event_startより後の日付を指定してください',
            // イベント詳細日時
            'event_time_discription.max' => 'イベント詳細日時は255文字以下で入力してください',
            // 料金
            'fee.numeric' => '料金は数値以外入力できません',
            // 公式URL
            'official_url.url' => 'URLの形式が正しくありません',
            // 会場名
            'venue.required' => '会場名を入力してください',
            'venue.max' => '会場名は20文字以下で入力してください',
            // 郵便番号
            'zip.required' => '郵便番号を入力してください',
            'zip.zip' => '郵便番号の入力が間違っています',
            // 都道府県
            'address1.required' => '都道府県を選択してください',
            // 住所
            'address2.required' => '住所を入力してください',
            // カテゴリー
            'category_id.required' => 'カテゴリーを選択してください',
        ];
    }
}
