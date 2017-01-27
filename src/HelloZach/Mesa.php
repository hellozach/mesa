<?php
namespace HelloZach;

class Mesa
{
    private static $table = null;

    protected $columns = [];
    protected $rows = [];

    public function setColumns($columns = [])
    {
        $this->columns = ! is_array($columns) ? explode(',', str_replace(', ', ',', $columns)) : $columns;
    }

    public function addRow($row)
    {
        $this->rows[] = $row;
    }

    public function allRows($rows)
    {
        $this->rows = $rows;
    }

    public function output($classes = null)
    {
        $addons = [];

        if ( $classes !== null ) {
            $addons[] = "classes=\"{$classes}\"";
        }

        $addons = implode(' ', $addons);

        $table = "<table {$addons}>";

        if ( ! empty($this->columns) ) {
            $table .= '<thead>';

            foreach ( $this->columns as $column ) {
                $table .= '<th>' . $column . '</th>';
            }

            $table .= '</thead>';
        }

        $table .= '<tbody>';

        foreach ( $this->rows as $row ) {
            $table .= '<tr>';

            foreach ( $row as $data ) {
                $table .= '<td>' . $data . '</td>';
            }

            $table .= '</tr>';
        }

        $table .= '</tbody>';

        $table .= '</table>';

        return $table;
    }
}
