<?php

namespace App\Http\Controllers;

use App\Http\Requests\Companies\EditCompaniesRequest;
use Illuminate\Http\Request;
use App\Http\Requests\Companies\StoreCompaniesRequest;
use App\Models\Company;
use Yajra\DataTables\Facades\DataTables;


class CompanyController extends Controller
{
    // Função para exibir a lista de empresas
    public function index()
    {
        return view('empresas');
    }

    // Função para salvar a nova empresa no banco de dados
    public function store(StoreCompaniesRequest $request)
    {
        try {
            
            Company::create($request);

            return response()->json(['message' => 'Criado com sucesso'], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Algo deu errado', 'message' => $e->getMessage()], 500);
        }
    }

    // Função para exibir o formulário de edição de empresa
    public function edit(EditCompaniesRequest $company, $companies_id)
    {
        try {
            return response()->json(['message' => 'Criado com sucesso'], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Algo deu errado', 'message' => $e->getMessage()], 500);
        }
    }

    // Função para atualizar a empresa no banco de dados
    public function update(Request $request, Company $company)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'cnpj' => 'required|integer|unique:companies,cnpj,' . $company->id,
            // Adicione outras validações e campos conforme necessário
        ]);

        $company->update($data);

        return redirect()->route('companies.index')->with('success', 'Empresa atualizada com sucesso!');
    }

    // Função para excluir a empresa do banco de dados
    public function destroy(Company $company)
    {
        $company->delete();

        return redirect()->route('companies.index')->with('success', 'Empresa excluída com sucesso!');
    }

    public function getDataTables()
    {
        $companies = Company::select(['id', 'name', 'cnpj']);

        return DataTables::of($companies)
            ->addColumn('action', function ($company) {
                // Aqui você pode adicionar links ou botões para ações, por exemplo, editar ou excluir
                return '<a href="#">Editar</a>';
            })
            ->rawColumns(['action'])
            ->toJson();
    }
}