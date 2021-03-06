<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGame extends FormRequest
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
            "home_team_id" => "required|exists:teams,team_id|different:away_team_id",
            "away_team_id" => "required|exists:teams,team_id|different:home_team_id",
            "home_players" => "required|size:11",
            "away_players" => "required|size:11",
            "game_datetime" => "required|date"
        ];
    }
}
