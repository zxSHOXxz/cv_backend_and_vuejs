<?php

namespace App\DataTables;

use App\Models\PersonalInformation;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PersonalInformationDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function (PersonalInformation $personal_information) {
                return view('pages/apps.personal-information.columns._actions', compact('personal_information'));
            })
            ->editColumn('freelance', function (PersonalInformation $personal_information) {
                $status = $personal_information->freelance ? 'Available' : 'Not Available';
                $badgeClass = $personal_information->freelance ? 'badge-success' : 'badge-danger';
                return sprintf('<span class="badge %s">%s</span>', $badgeClass, $status);
            })
            ->editColumn('resume', function (PersonalInformation $personal_information) {
                if ($personal_information->resume) {
                    return '<a href="' . asset('storage/' . $personal_information->resume) . '" target="_blank" class="btn btn-icon btn-sm btn-light-primary">' .
                        '<i class="fas fa-download"></i>' .
                        '</a>';
                }
                return 'No resume';
            })
            ->rawColumns(['action', 'freelance', 'resume'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(PersonalInformation $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('personal-informations-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('rt' . "<'row'<'col-sm-12'tr>><'d-flex justify-content-between'<'col-sm-12 col-md-5'i><'d-flex justify-content-between'p>>",)
            ->addTableClass('table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer text-gray-600 fw-semibold')
            ->setTableHeadClass('text-start text-muted fw-bold fs-7 text-uppercase gs-0')
            ->orderBy(2)
            ->drawCallback("function() {" . file_get_contents(resource_path('views/pages/apps/personal-information/columns/_draw-scripts.js')) . "}");
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('name'),
            Column::make('age'),
            Column::make('residence'),
            Column::make('address'),
            Column::make('email'),
            Column::make('phone'),
            Column::make('resume'),
            Column::make('job_title'),
            Column::make('about_me'),
            Column::make('signture'),
            Column::make('freelance'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'PersonalInformation_' . date('YmdHis');
    }
}
