<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormulirPesanan extends Model
{
    protected $table = "formulir_pesanan";

    function getFormulirPesananJoin5Where($where, $eq, $value, $order, $orderby)
    {
        return  FormulirPesanan::join('kalkulator_kpr', 'formulir_pesanan.id_kkpr', '=', 'kalkulator_kpr.id_kkpr')
            ->join('user_pelanggan', 'formulir_pesanan.id_pelanggan', '=', 'user_pelanggan.id_pelanggan')
            ->join('tipe_rumah', 'formulir_pesanan.id_tipe_rumah', '=', 'tipe_rumah.id_tipe_rumah')
            ->join('user_admin', 'formulir_pesanan.id_user_admin', '=', 'user_admin.id_user_admin')
            ->join('ktgr_admin', 'user_admin.id_kategori', '=', 'ktgr_admin.id_kategori')
            ->where($where, $eq, $value)
            ->orderBy($order, $orderby)
            ->get();
    }

    function getFormulirPesananProjekJoin6Where($where, $eq, $value, $order, $orderby)
    {
        return  FormulirPesanan::join('kalkulator_kpr', 'formulir_pesanan.id_kkpr', '=', 'kalkulator_kpr.id_kkpr')
            ->join('rumah', 'formulir_pesanan.id_rumah', '=', 'rumah.id_rumah')
            ->join('projek', 'rumah.id_projek', '=', 'projek.id_projek')
            ->join('user_pelanggan', 'formulir_pesanan.id_pelanggan', '=', 'user_pelanggan.id_pelanggan')
            ->join('tipe_rumah', 'formulir_pesanan.id_tipe_rumah', '=', 'tipe_rumah.id_tipe_rumah')
            ->join('user_admin', 'formulir_pesanan.id_user_admin', '=', 'user_admin.id_user_admin')
            ->join('ktgr_admin', 'user_admin.id_kategori', '=', 'ktgr_admin.id_kategori')
            ->where($where, $eq, $value)
            ->orderBy($order, $orderby)
            ->get();
    }
    function getFormulirPesananProjekJoin6Where2($where, $eq, $value, $where2, $eq2, $value2, $order, $orderby)
    {
        return  FormulirPesanan::join('kalkulator_kpr', 'formulir_pesanan.id_kkpr', '=', 'kalkulator_kpr.id_kkpr')
            ->join('rumah', 'formulir_pesanan.id_rumah', '=', 'rumah.id_rumah')
            ->join('projek', 'rumah.id_projek', '=', 'projek.id_projek')
            ->join('user_pelanggan', 'formulir_pesanan.id_pelanggan', '=', 'user_pelanggan.id_pelanggan')
            ->join('tipe_rumah', 'formulir_pesanan.id_tipe_rumah', '=', 'tipe_rumah.id_tipe_rumah')
            ->join('user_admin', 'formulir_pesanan.id_user_admin', '=', 'user_admin.id_user_admin')
            ->join('ktgr_admin', 'user_admin.id_kategori', '=', 'ktgr_admin.id_kategori')
            ->where($where, $eq, $value)
            ->where($where2, $eq2, $value2)
            ->orderBy($order, $orderby)
            ->get();
    }

    function getFormulirPesananProjekJoin6WhereArr($where, $order, $orderby)
    {
        return  FormulirPesanan::join('kalkulator_kpr', 'formulir_pesanan.id_kkpr', '=', 'kalkulator_kpr.id_kkpr')
            ->join('rumah', 'formulir_pesanan.id_rumah', '=', 'rumah.id_rumah')
            ->join('projek', 'rumah.id_projek', '=', 'projek.id_projek')
            ->join('user_pelanggan', 'formulir_pesanan.id_pelanggan', '=', 'user_pelanggan.id_pelanggan')
            ->join('tipe_rumah', 'formulir_pesanan.id_tipe_rumah', '=', 'tipe_rumah.id_tipe_rumah')
            ->join('user_admin', 'formulir_pesanan.id_user_admin', '=', 'user_admin.id_user_admin')
            ->join('ktgr_admin', 'user_admin.id_kategori', '=', 'ktgr_admin.id_kategori')
            ->where($where)
            ->orderBy($order, $orderby)
            ->get();
    }
    function getFormulirPesananJoin5($order, $orderby)
    {
        return  FormulirPesanan::join('kalkulator_kpr', 'formulir_pesanan.id_kkpr', '=', 'kalkulator_kpr.id_kkpr')
            ->join('user_pelanggan', 'formulir_pesanan.id_pelanggan', '=', 'user_pelanggan.id_pelanggan')
            ->join('tipe_rumah', 'formulir_pesanan.id_tipe_rumah', '=', 'tipe_rumah.id_tipe_rumah')
            ->join('user_admin', 'formulir_pesanan.id_user_admin', '=', 'user_admin.id_user_admin')
            ->join('ktgr_admin', 'user_admin.id_kategori', '=', 'ktgr_admin.id_kategori')

            ->orderBy($order, $orderby)
            ->get();
    }


    function getFormulirPesananJoin5Count()
    {
        return FormulirPesanan::join('kalkulator_kpr', 'formulir_pesanan.id_kkpr', '=', 'kalkulator_kpr.id_kkpr')
        ->join('rumah', 'formulir_pesanan.id_rumah', '=', 'rumah.id_rumah')
        ->join('projek', 'rumah.id_projek', '=', 'projek.id_projek')

        ->join('user_pelanggan', 'formulir_pesanan.id_pelanggan', '=', 'user_pelanggan.id_pelanggan')
            ->join('tipe_rumah', 'formulir_pesanan.id_tipe_rumah', '=', 'tipe_rumah.id_tipe_rumah')
            ->join('user_admin', 'formulir_pesanan.id_user_admin', '=', 'user_admin.id_user_admin')
            ->join('ktgr_admin', 'user_admin.id_kategori', '=', 'ktgr_admin.id_kategori')
            ->select(FormulirPesanan::raw('COUNT(formulir_pesanan.tgl_input_fp) as count'))
            ->first();
    }
    function getFormulirPesananJoin5CountWhereProjek($where)
    {
        return FormulirPesanan::join('kalkulator_kpr', 'formulir_pesanan.id_kkpr', '=', 'kalkulator_kpr.id_kkpr')
        ->join('rumah', 'formulir_pesanan.id_rumah', '=', 'rumah.id_rumah')
        ->join('projek', 'rumah.id_projek', '=', 'projek.id_projek')

        ->join('user_pelanggan', 'formulir_pesanan.id_pelanggan', '=', 'user_pelanggan.id_pelanggan')
            ->join('tipe_rumah', 'formulir_pesanan.id_tipe_rumah', '=', 'tipe_rumah.id_tipe_rumah')
            ->join('user_admin', 'formulir_pesanan.id_user_admin', '=', 'user_admin.id_user_admin')
            ->join('ktgr_admin', 'user_admin.id_kategori', '=', 'ktgr_admin.id_kategori')
            ->select(FormulirPesanan::raw('COUNT(formulir_pesanan.tgl_input_fp) as count'))
            ->where($where)
            ->first();
    }

    function getFormulirPesananJoin5CountWhereUser($where)
    {
        return FormulirPesanan::join('kalkulator_kpr', 'formulir_pesanan.id_kkpr', '=', 'kalkulator_kpr.id_kkpr')
            ->join('rumah', 'formulir_pesanan.id_rumah', '=', 'rumah.id_rumah')
            ->join('projek', 'rumah.id_projek', '=', 'projek.id_projek')
            ->join('user_pelanggan', 'formulir_pesanan.id_pelanggan', '=', 'user_pelanggan.id_pelanggan')
            ->join('tipe_rumah', 'formulir_pesanan.id_tipe_rumah', '=', 'tipe_rumah.id_tipe_rumah')
            ->join('user_admin', 'formulir_pesanan.id_user_admin', '=', 'user_admin.id_user_admin')
            ->join('ktgr_admin', 'user_admin.id_kategori', '=', 'ktgr_admin.id_kategori')
            ->where($where)
            ->select(FormulirPesanan::raw('COUNT(formulir_pesanan.tgl_input_fp) as count'))
            ->first();
    }
    function getFormulirPesananJoin5CountWhere($where, $value)
    {
        return FormulirPesanan::join('kalkulator_kpr', 'formulir_pesanan.id_kkpr', '=', 'kalkulator_kpr.id_kkpr')
        ->join('rumah', 'formulir_pesanan.id_rumah', '=', 'rumah.id_rumah')
        ->join('projek', 'rumah.id_projek', '=', 'projek.id_projek')

            ->join('user_pelanggan', 'formulir_pesanan.id_pelanggan', '=', 'user_pelanggan.id_pelanggan')
            ->join('tipe_rumah', 'formulir_pesanan.id_tipe_rumah', '=', 'tipe_rumah.id_tipe_rumah')
            ->join('user_admin', 'formulir_pesanan.id_user_admin', '=', 'user_admin.id_user_admin')
            ->join('ktgr_admin', 'user_admin.id_kategori', '=', 'ktgr_admin.id_kategori')
            ->whereMonth($where, $value)
            ->select(FormulirPesanan::raw('COUNT(formulir_pesanan.tgl_input_fp) as count'))
            ->first();
    }
    function getFormulirPesananJoin5CountWhereMonthProjek($where, $value,$where2)
    {
        return FormulirPesanan::join('kalkulator_kpr', 'formulir_pesanan.id_kkpr', '=', 'kalkulator_kpr.id_kkpr')
        ->join('rumah', 'formulir_pesanan.id_rumah', '=', 'rumah.id_rumah')
        ->join('projek', 'rumah.id_projek', '=', 'projek.id_projek')

            ->join('user_pelanggan', 'formulir_pesanan.id_pelanggan', '=', 'user_pelanggan.id_pelanggan')
            ->join('tipe_rumah', 'formulir_pesanan.id_tipe_rumah', '=', 'tipe_rumah.id_tipe_rumah')
            ->join('user_admin', 'formulir_pesanan.id_user_admin', '=', 'user_admin.id_user_admin')
            ->join('ktgr_admin', 'user_admin.id_kategori', '=', 'ktgr_admin.id_kategori')
            ->whereMonth($where, $value)
            ->where($where2)
            ->select(FormulirPesanan::raw('COUNT(formulir_pesanan.tgl_input_fp) as count'))
            ->first();
    }

    function getFormulirPesananJoin5CountWhereMonth($where, $value, $where2)
    {
        return FormulirPesanan::join('kalkulator_kpr', 'formulir_pesanan.id_kkpr', '=', 'kalkulator_kpr.id_kkpr')
            ->join('rumah', 'formulir_pesanan.id_rumah', '=', 'rumah.id_rumah')
            ->join('projek', 'rumah.id_projek', '=', 'projek.id_projek')
            ->join('user_pelanggan', 'formulir_pesanan.id_pelanggan', '=', 'user_pelanggan.id_pelanggan')
            ->join('tipe_rumah', 'formulir_pesanan.id_tipe_rumah', '=', 'tipe_rumah.id_tipe_rumah')
            ->join('user_admin', 'formulir_pesanan.id_user_admin', '=', 'user_admin.id_user_admin')
            ->join('ktgr_admin', 'user_admin.id_kategori', '=', 'ktgr_admin.id_kategori')
            ->whereMonth($where, $value)
            ->where($where2)
            ->select(FormulirPesanan::raw('COUNT(formulir_pesanan.tgl_input_fp) as count'))
            ->first();
    }

    function getFormulirPesananJoin7Where($id)
    {
        return FormulirPesanan::join('kalkulator_kpr', 'formulir_pesanan.id_kkpr', '=', 'kalkulator_kpr.id_kkpr')
            ->join('rumah', 'formulir_pesanan.id_rumah', '=', 'rumah.id_rumah')
            ->join('cluster', 'rumah.codecluster', '=', 'cluster.codecluster')
            ->join('user_pelanggan', 'formulir_pesanan.id_pelanggan', '=', 'user_pelanggan.id_pelanggan')
            ->join('tipe_rumah', 'formulir_pesanan.id_tipe_rumah', '=', 'tipe_rumah.id_tipe_rumah')
            ->join('user_admin', 'formulir_pesanan.id_user_admin', '=', 'user_admin.id_user_admin')
            ->join('ktgr_admin', 'user_admin.id_kategori', '=', 'ktgr_admin.id_kategori')
            ->where('id_formulir', '=', $id)
            ->first();
    }

    // INSERT

    function insertGetIDFormulirPesanan($data) {
        return FormulirPesanan::insertGetId(
            $data
        );
    }
}
