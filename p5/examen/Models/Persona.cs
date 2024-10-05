using System;
using System.Collections.Generic;

namespace examen.Models;

public partial class Persona
{
    public int IdPersona { get; set; }

    public string Nombre { get; set; } = null!;

    public string ApellidoPaterno { get; set; } = null!;

    public string ApellidoMaterno { get; set; } = null!;

    public string? Direccion { get; set; }

    public int? IdDistrito { get; set; }

    public int? IdZona { get; set; }

    public int? IdPropiedad { get; set; }

    public int? Ci { get; set; }

    public virtual Propiedad? IdPropiedadNavigation { get; set; }

    public virtual ICollection<Usuario> Usuarios { get; set; } = new List<Usuario>();
}
