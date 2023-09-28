<?php

namespace App\Http\Controllers;

use App\Services\Web\AdminPanelService;
use App\Services\Web\AuthTestService;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Método contrutor da classe
     *
     * @param  AuthTestService  $authTestService   Instância de AuthTestService
     * @param  AdminPanelService  $adminPanelService Instância de AdminPanelService
     * @return void
     */
    public function __construct(
        private readonly AuthTestService $authTestService,
        private readonly AdminPanelService $adminPanelService
    ) {
    }

    /**
     * Método responsável por renderizar a página home do painel de admin
     */
    public function index()
    {
        //TESTA A AUTENTICAÇÃO
        if (! $this->authTestService->testAuth()) {
            return redirect('/login')->withErrors(['auth' => 'Não autenticado!']);
        }

        return view('pages.admin.index');
    }

    /**
     * Método responsável por renderizar a página com todos os seller
     */
    public function showSellers()
    {
        //TESTA A AUTENTICAÇÃO
        if (! $this->authTestService->testAuth()) {
            return redirect('/login')->withErrors(['auth' => 'Não autenticado!']);
        }

        $sellersData = $this->adminPanelService->getAllSellers();

        return view('pages.admin.sellers.index', [
            'sellersData' => $sellersData,
        ]);
    }

    /**
     * Método responsável por renderizar a página com todas as vendas de um ou mais sellers
     */
    public function showSales(Request $request)
    {
        //TESTA A AUTENTICAÇÃO
        if (! $this->authTestService->testAuth()) {
            return redirect('/login')->withErrors(['auth' => 'Não autenticado!']);
        }

        $sellerId = $request->get('sellerId') ?? 0;

        $salesData = ($sellerId > 0) ? $this->adminPanelService->getSellerSales($sellerId) : $this->adminPanelService->getAllSales();

        return view('pages.admin.sales.index', [
            'salesData' => $salesData,
        ]);
    }

    /**
     * Método responsável por renderizar a página de detalhe de um seller
     *
     * @param  int  $id Identificador do seller
     */
    public function showSeller(int $id)
    {
        //TESTA A AUTENTICAÇÃO
        if (! $this->authTestService->testAuth()) {
            return redirect('/login')->withErrors(['auth' => 'Não autenticado!']);
        }

        $sellerData = $this->adminPanelService->getSeller($id ?? 0);

        if (empty($sellerData)) {
            return back()->withErrors(['error' => 'Vendedor não encontrado']);
        }

        return view('pages.admin.sellers.detail', [
            'sellerData' => $sellerData,
        ]);
    }

    /**
     * Método responsável por renderizar a página de cadastro de seller
     */
    public function showCreateSellerForm()
    {
        //TESTA A AUTENTICAÇÃO
        if (! $this->authTestService->testAuth()) {
            return redirect('/login')->withErrors(['auth' => 'Não autenticado!']);
        }

        return view('pages.admin.sellers.create');
    }

    /**
     * Método responsável por renderizar a página de cadastro de uma venda a um seller
     *
     * @param  int  $id Identificador do seller
     */
    public function showCreateSaleForm($id)
    {
        //TESTA A AUTENTICAÇÃO
        if (! $this->authTestService->testAuth()) {
            return redirect('/login')->withErrors(['auth' => 'Não autenticado!']);
        }

        $sellerData = $this->adminPanelService->getSeller($id ?? 0);

        if (empty($sellerData)) {
            return back()->withErrors(['error' => 'Vendedor não encontrado']);
        }

        return view('pages.admin.sales.create', [
            'id' => $id,
            'sellerData' => $sellerData,
        ]);
    }

    /**
     * Método responsável por realizar o cadastro de um novo seller
     */
    public function createSeller(Request $request)
    {
        //TESTA A AUTENTICAÇÃO
        if (! $this->authTestService->testAuth()) {
            return redirect('/login')->withErrors(['auth' => 'Não autenticado!']);
        }

        if (! $this->adminPanelService->createSeller($request)) {
            return back()->withErrors(['error' => 'Erro ao cadastrar vendedor!']);
        }

        return redirect('/admin/sellers')->with('success', 'Novo vendedor cadastrado com sucesso!');
    }

    /**
     * Método responsável por realizar o cadastro de uma nova venda
     *
     * @param  int  $id      Identificador do seller
     */
    public function createSale(Request $request, $id)
    {
        //TESTA A AUTENTICAÇÃO
        if (! $this->authTestService->testAuth()) {
            return redirect('/login')->withErrors(['auth' => 'Não autenticado!']);
        }

        if (! $this->adminPanelService->createSale($request, $id)) {
            return back()->withErrors(['error' => 'Erro ao cadastrar venda!']);
        }

        return redirect("/admin/sales/create/{$id}")->with('success', 'Nova venda cadastrada com sucesso!');
    }

    /**
     * Método responsável por realizar a exclusão de um vendedor
     *
     * @param  int  $id Identificador do seller
     */
    public function deleteSeller($id)
    {
        //TESTA A AUTENTICAÇÃO
        if (! $this->authTestService->testAuth()) {
            return redirect('/login')->withErrors(['auth' => 'Não autenticado!']);
        }

        if (! $this->adminPanelService->deleteSeller($id)) {
            return back()->withErrors(['error' => 'Erro ao excluir o vendedor!']);
        }

        return back()->with('success', 'Vendedor excluído com sucesso!');
    }

    public function sendSellerSalesReportMail($id)
    {
        if (! $this->adminPanelService->sendSellerSalesReportMail($id)) {
            return back()->withErrors(['error' => 'Erro ao enviar e-mail!']);
        }

        return back()->with(['success' => 'E-mail enviado ao vendedor com sucesso!']);
    }
}
