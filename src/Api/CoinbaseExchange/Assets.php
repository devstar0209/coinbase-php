<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Coinbase\Api\CoinbaseExchange;

use Lin\Coinbase\Request;

class Assets extends Request
{
    /**
     * GET /wrapped-assets
     * */
    public function getWrapList(array $data=[]){
        $this->type='GET';
        $this->path='/wrapped-assets';
        $this->data=$data;
        return $this->exec();
    }

    /**
     * GET /wrapped-assets/{wrapped_asset_id}
     * */
    public function getWrap(array $data=[]){
        $this->type='GET';
        $this->path='/wrapped-assets/'.$data['wrapped_asset_id'];
        $this->data=$data;
        return $this->exec();
    }

    /**
     * GET /wrapped-assets/{wrapped_asset_id}/conversion-rate
     * */
    public function getWrapConversionRate(array $data=[]){
        $this->type='GET';
        $this->path='/wrapped-assets/'.$data['wrapped_asset_id'].'/conversion-rate';
        $this->data=$data;
        return $this->exec();
    }

    /**
     * GET /wrapped-assets/stake-wrap
     * */
    public function getStakeWrapList(array $data=[]){
        $this->type='GET';
        $this->path='/wrapped-assets/stake-wrap';
        $this->data=$data;
        return $this->exec();
    }

    /**
     * GET /wrapped-assets/stake-wrap/{stake_wrap_id}
     * */
    public function getStakeWrap(array $data=[]){
        $this->type='GET';
        $this->path='/wrapped-assets/stake-wrap/'.$data['stake_wrap_id'];
        $this->data=$data;
        return $this->exec();
    }

    /**
     * POST /wrapped-assets/stake-wrap
     * */
    public function postStakeWrap(array $data=[]){
        $this->type='POST';
        $this->path='/wrapped-assets/stake-wrap';
        $this->data=$data;
        return $this->exec();
    }
}
