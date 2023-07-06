<?php

namespace App\Http\Services;

use App\Consts;
use App\Models\AffiliateHistory;
use App\Models\AffiliatePayment;
use App\Models\User;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserService
{
    public static function createUser($params)
    {
        $params = collect($params)
            ->only([
                'name',
                'email',
                'password',
                'status',
                'sex',
                'phone',
                'affiliate_id',
            ])->all();

        $user = User::create($params);
        $affiliate_code = Str::random(5);
        $user->affiliate_code = $affiliate_code . $user->id;
        $user->save();

        return $user;
    }

    public static function getUsers($params = [])
    {
        $query = User::select('users.*')
            ->selectRaw('b.name AS affiliate_agent')

            ->leftJoin('users AS b', 'users.affiliate_id', '=', 'b.id')

            ->when(!empty($params['keyword']), function ($query) use ($params) {
                return $query->where(function ($where) use ($params) {
                    return $where->where('users.email', 'like', '%' . $params['keyword'] . '%')
                        ->orWhere('users.name', 'like', '%' . $params['keyword'] . '%');
                });
            })
            ->when(!empty($params['id']), function ($query) use ($params) {
                return $query->where('users.id', $params['id']);
            })
            ->when(!empty($params['status']), function ($query) use ($params) {
                return $query->where('users.status', $params['status']);
            });
        if (!empty($params['order_by'])) {
            if (is_array($params['order_by'])) {
                foreach ($params['order_by'] as $key => $value) {
                    $query->orderBy('users.' . $key, $value);
                }
            } else {
                $query->orderByRaw('users.' . $params['order_by'] . ' desc');
            }
        } else {
            $query->orderByRaw('users.id desc');
        }

        return $query;
    }

    public static function createPayment($params)
    {
        $params = collect($params)->only([
            'user_id',
            'money',
            'description',
            'json_params',
            'status'
        ])->all();

        $user = User::find($params['user_id']);
        // Check money compare with avaiable total money
        if ($params['money'] < Consts::WITHDRAW_MIN) {
            throw new Exception((__('Minimum amount per withdrawal') . ' < ' . Consts::WITHDRAW_MIN));
        } else if ($params['money'] > $user->total_money) {
            throw new Exception((__('Maximum amount you can withdraw') . ' > ' . $user->total_money));
        }
        // Create payment
        $affiliate_payment = AffiliatePayment::create($params);
        // Update user
        $user->total_score -= $affiliate_payment->money;
        $user->total_money -= $affiliate_payment->money;
        $user->total_payment += $affiliate_payment->money;
        $user->save();

        return $affiliate_payment;
    }

    public static function getAffiliateHistory($params = [])
    {
        $query = AffiliateHistory::select('tb_affiliate_historys.*')
            ->selectRaw('b.name AS affiliate_name, b.affiliate_code')

            ->leftJoin('users AS b', 'tb_affiliate_historys.user_id', '=', 'b.id')

            ->when(!empty($params['keyword']), function ($query) use ($params) {
                return $query->where(function ($where) use ($params) {
                    return $where->where('b.affiliate_code', 'like', '%' . $params['keyword'] . '%')
                        ->orWhere('b.name', 'like', '%' . $params['keyword'] . '%')
                        ->orWhere('b.phone', 'like', '%' . $params['keyword'] . '%');
                });
            })
            ->when(!empty($params['id']), function ($query) use ($params) {
                return $query->where('tb_affiliate_historys.id', $params['id']);
            })
            ->when(!empty($params['status']), function ($query) use ($params) {
                return $query->where('tb_affiliate_historys.status', $params['status']);
            })
            ->when(!empty($params['created_at_from']), function ($query) use ($params) {
                $query->where('tb_affiliate_historys.created_at', '>=', $params['created_at_from']);
            })
            ->when(!empty($params['created_at_to']), function ($query) use ($params) {
                $query->where('tb_affiliate_historys.created_at', '<=', $params['created_at_to']);
            });
        if (!empty($params['order_by'])) {
            if (is_array($params['order_by'])) {
                foreach ($params['order_by'] as $key => $value) {
                    $query->orderBy('tb_affiliate_historys.' . $key, $value);
                }
            } else {
                $query->orderByRaw('tb_affiliate_historys.' . $params['order_by'] . ' desc');
            }
        } else {
            $query->orderByRaw('tb_affiliate_historys.id desc');
        }

        return $query;
    }

    public static function getAffiliatePayment($params = [])
    {
        $query = AffiliatePayment::select('tb_affiliate_payments.*')
            ->selectRaw('b.name AS affiliate_name, b.affiliate_code, b.phone, b.email')

            ->leftJoin('users AS b', 'tb_affiliate_payments.user_id', '=', 'b.id')

            ->when(!empty($params['keyword']), function ($query) use ($params) {
                return $query->where(function ($where) use ($params) {
                    return $where->where('b.affiliate_code', 'like', '%' . $params['keyword'] . '%')
                        ->orWhere('b.name', 'like', '%' . $params['keyword'] . '%')
                        ->orWhere('b.phone', 'like', '%' . $params['keyword'] . '%');
                });
            })
            ->when(!empty($params['id']), function ($query) use ($params) {
                return $query->where('tb_affiliate_payments.id', $params['id']);
            })
            ->when(!empty($params['status']), function ($query) use ($params) {
                return $query->where('tb_affiliate_payments.status', $params['status']);
            })
            ->when(!empty($params['created_at_from']), function ($query) use ($params) {
                $query->where('tb_affiliate_payments.created_at', '>=', $params['created_at_from']);
            })
            ->when(!empty($params['created_at_to']), function ($query) use ($params) {
                $query->where('tb_affiliate_payments.created_at', '<=', $params['created_at_to']);
            });
        if (!empty($params['order_by'])) {
            if (is_array($params['order_by'])) {
                foreach ($params['order_by'] as $key => $value) {
                    $query->orderBy('tb_affiliate_payments.' . $key, $value);
                }
            } else {
                $query->orderByRaw('tb_affiliate_payments.' . $params['order_by'] . ' desc');
            }
        } else {
            $query->orderByRaw('tb_affiliate_payments.id desc');
        }

        return $query;
    }
}
