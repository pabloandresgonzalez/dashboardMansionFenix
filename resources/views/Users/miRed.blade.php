@extends('layouts.user_type.auth')

@section('content')

<div class="row">
  <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
    <div class="carddata shadow-lg border-0 rounded-3">
      <div class="carddata-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbersdata">
              <p class="text-sm mb-0 text-capitalize font-weight-bold">BTC | (USD)</p>
              <h5 class="font-weight-bolder mb-0">
                ${{ $price }}<span class="text-success font-weight-bold"> {{ $currency }}</span>
              </h5>
            </div>
          </div>
          <div class="col-4 d-flex justify-content-end align-items-center">
            <div class="icondata bg-gradient-primary p-3 text-white shadow border-radius-md"> 
              <i class="fa-brands fa-btc text-lg opacity-10" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
    <div class="carddata shadow-lg border-0 rounded-3">
      <div class="carddata-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbersdata">
              <p class="text-sm mb-0 text-capitalize font-weight-bold">Mis asociados</p>
              <h5 class="font-weight-bolder mb-0">
                {{ $total }} <span class="text-success font-weight-bold">10% x referido</span>
              </h5>
            </div>
          </div>
          <div class="col-4 d-flex justify-content-end align-items-center">
            <div class="icondatadorado bg-gradient-primary p-3 text-white shadow border-radius-md"> 
              <i class="fa fa-user-group text-lg opacity-10" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
    <div class="carddata shadow-lg border-0 rounded-3">
      <div class="carddata-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbersdata">
              <p class="text-sm mb-0 text-capitalize font-weight-bold">x referidos</p>
              <h5 class="font-weight-bolder mb-0">
                ${{ $totalCommission }}
                <span class="text-danger text-sm font-weight-bolder">USDT</span>
              </h5>
            </div>
          </div>
          <div class="col-4 d-flex justify-content-end align-items-center">
            <div class="icondata bg-gradient-primary text-white shadow text-center border-radius-md"> 
              <i class="fas fa-donate text-lg opacity-10" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6">
    <div class="carddata shadow-lg border-0 rounded-3">
      <div class="carddata-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbersdata">
              <p class="text-sm mb-0 text-capitalize font-weight-bold">Utilidad mensual</p>
              <h5 class="font-weight-bolder mb-0">
                ${{ $totalProduction }}
                <span class="text-success text-sm font-weight-bolder">PSIV</span>                
              </h5>
            </div>
          </div>
          <div class="col-4 text-end">
            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
              <i class="fa-solid fa-coins text-lg opacity-10" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container mx-auto mt-4">
    <h5 class="text-2xl font-bold mb-2">Mis Referidos</h5>
    <!-- Modificar altura del contenedor -->
    <div id="network" class="relative w-full" style="height: 400px;"> <!-- Aumenta la altura aquí -->
    </div>
</div>

<script>

(() => {
    const referidos = @json($referidos);

    // Obtener los datos del usuario logueado desde Laravel
    const miNodo = {
        id: 0,
        name: "{{ $user->name }}", // Nombre del usuario logueado
        lastname: "{{ $user->lastname }}", // Apellido del usuario logueado
        email: "{{ $user->email }}", // Email del usuario logueado
        isActive: "{{ $user->isActive }}", // Estado del usuario
        membership_id: "{{ $user->membership_id }}", // ID de la membresía si aplica
    };

    referidos.unshift(miNodo); // Agrega a tu nodo al principio de la lista de referidos

    const container = document.getElementById('network');
    const nodes = [];
    const edges = [];

    const avatarUrl = "https://i.postimg.cc/hvHVchNw/bruce-mars1.png"; // URL de la imagen
    const baseSize = 50;

    // Generar posiciones dinámicas para los nodos
    referidos.forEach((_, index) => {
        const angle = (index / referidos.length) * 2 * Math.PI; // Distribuir en un círculo
        const radius = 200; // Radio del círculo
        const x = Math.cos(angle) * radius;
        const y = Math.sin(angle) * radius;

        nodes.push({
            id: index + 1,
            label: `${referidos[index].name} ${referidos[index].lastname}`,
            image: avatarUrl,
            shape: "image",
            size: index === 0 ? baseSize : baseSize - 10,
            // Mostrar más información en el tooltip
            title: `
                <b>${referidos[index].name} ${referidos[index].lastname}</b><br>
                <strong>Email:</strong> ${referidos[index].email}<br>
                <strong>Estado:</strong> ${referidos[index].isActive === "1" ? "Activo" : "Inactivo"}<br>
                <strong>Fondo id:</strong> ${referidos[index].membership_id || "No disponible"}
            `,
            x: x, // Usar posición calculada dinámicamente
            y: y, // Usar posición calculada dinámicamente
        });

        if (index > 0) {
            edges.push({ from: 1, to: index + 1 });
        }
    });

    const data = {
        nodes: new vis.DataSet(nodes),
        edges: new vis.DataSet(edges),
    };

    const options = {
        layout: {
            hierarchical: { enabled: false },
        },
        nodes: {
            borderWidth: 2,
            font: { size: 14, color: "#000000" },
        },
        edges: {
            width: 1,
            selectionWidth: -1,
            color: { color: "#848484" },
            smooth: { type: "horizontal", roundness: 0.2 },
        },
        physics: { enabled: false },
        interaction: { tooltipDelay: 200 },
    };

    const network = new vis.Network(container, data, options);
})();


</script>





@endsection


