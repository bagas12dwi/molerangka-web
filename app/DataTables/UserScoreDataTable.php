<?php

namespace App\DataTables;

use App\Models\UserScore;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UserScoreDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'userscore.action')
            ->addIndexColumn()
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(UserScore $model): QueryBuilder
    {
        return $model->newQuery()
            ->with(['user', 'subMaterial'])
            ->select([
                'user_scores.*',
                DB::raw('(SELECT name FROM users WHERE users.id = user_scores.user_id) as user_name'),
                DB::raw('(SELECT name FROM sub_materials WHERE sub_materials.id = user_scores.sub_material_id) as sub_material_name'),
            ]);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('userscore-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1)
            ->selectStyleSingle()
            ->parameters([
                'dom'          => 'Bfrtip',
                'buttons'      => [''],
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')->title('No. ')->searchable(false)->orderable(false)->width(10),
            Column::make('user_name')->title('Nama Siswa'),
            Column::make('sub_material_name')->title('Submateri'),
            Column::make('score')->title('Skor')
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'UserScore_' . date('YmdHis');
    }
}
