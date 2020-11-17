<?php

namespace App\Exports;

use App\Models\UserModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Schema;

class UsersExport implements FromCollection, ShouldAutoSize, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $columns = Schema::getColumnListing('users');
        $columns = array_diff($columns, ['id', 'password', 'is_admin', 'remember_token', 'created_at', 'updated_at']);

        return UserModel::select($columns)->where('is_admin', '<>', 1)->get();
    }

    public function headings(): array
    {
        return [
            '学号',
            '姓名',
            '性别',
            '电话',
            '身份证',
            '出生日期',
            '民族',
            '经济',
            '户口',
            '寄宿',
            '户籍',
            '现住址',
            '是否留守',
            '留守儿童情况',
            '留守儿童托管情况',
            '毕业学校',
            '曾担任干部情况',
            '获奖情况',
        ];
    }
}
