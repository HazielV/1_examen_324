using System;
using System.Collections.Generic;

namespace examen.Models;

public partial class Zona
{
    public int IdZona { get; set; }

    public string? Nombre { get; set; }

    public int? IdDistrito { get; set; }

    public virtual Distrito? IdDistritoNavigation { get; set; }
}
