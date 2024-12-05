<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class restaController extends Controller
{
    public function hi($n1, $n2)
    {
        // Validaciones
        $validatedData = $this->validateNumbers($n1, $n2);

        if ($validatedData['error']) {
            return response()->json([
                'error' => $validatedData['message']
            ], 400);
        }

        // Realizar la suma
        $sum = $n1 - $n2;

        // Retornar la respuesta
        return response()->json([
            'number1' => $n1,
            'number2' => $n2,
            'result' => $sum
        ]);
    }

    private function validateNumbers($n1, $n2)
    {
        // Validar si los números son válidos
        if (!is_numeric($n1) || !is_numeric($n2)) {
            return [
                'error' => true,
                'message' => 'Both parameters must be valid numbers.'
            ];
        }

        return ['error' => false];
    }
}
