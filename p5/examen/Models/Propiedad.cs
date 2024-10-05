using System;
using System.Collections.Generic;

namespace examen.Models;

public partial class Propiedad
{
    public int IdPropiedad { get; set; }

    public string? Direccion { get; set; }

    public string CodigoCatastral { get; set; } = null!;

    public int? IdImpuesto { get; set; }

    public virtual Impuesto? IdImpuestoNavigation { get; set; }

    public virtual ICollection<Persona> Personas { get; set; } = new List<Persona>();
}
